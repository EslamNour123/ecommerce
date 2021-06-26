<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Auth;

class ShoppingController extends Controller
{

    public function index_cart(){
        $cart_items = \Cart::session(Auth::user()->id)->getContent();
        return view('users.cart.index_cart',compact('cart_items'));
    }

    public function add_cart($id){
        $products = Product::FindOrFail($id);
        $cart_items= \Cart::session(Auth::user()->id)->add([
            'id' => $products->id,
            'name' => $products->name_ar,
            'price' => $products->price - ($products->price * $products->descount/100),
            'quantity' => 1,
            'attributes' => array(
                'name_en' => $products->name_en,
                'image'       => $products->images()->pluck('image')->toArray(),
                'descount' => $products->descount,
                
            ),
        ]);
        // dd($cart_items->name);
            
        return redirect()->back()->with('message',Trans('site.add_cart_message'));
    }

    public function update_p($id){
        \Cart::session(Auth::user()->id)->update($id,[
            'quantity' => +1,
        ]);
        return redirect()->back();
    }

    public function update_m($id){
        \Cart::session(Auth::user()->id)->update($id,[
            'quantity' => -1,
        ]);
        return redirect()->back();
    }

    public function delete_cart($id){
        \Cart::session(Auth::user()->id)->remove($id);
        return redirect()->back();
    }

}
