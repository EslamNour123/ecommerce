<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderProdcut;
use App\Models\Setting;
use Auth;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function show_order_vendor(){
        $orders   = Order::orderBy('id','desc')->paginate(5);
        return response()->json([$orders],200);
    }

    public function details_order_vendor($id){
        $order = Order::findOrFail($id);
        $details_order = OrderProdcut::where('order_id',$order->id)->first();
        return response()->json([$details_order],200);
    }

    public function delete_order_vendor($id){
        $orders = Order::findOrFail($id)->delete();

        return response()->json(['the order is deleted'],200);
    }

    public function add_order(OrderRequest $req){
        // dd(\Cart::session(Auth::user()->id)->getSubTotal() * (1 + 3/100) );
    // $total_price_after_tax = \Cart::session(Auth::user()->id)->getSubTotal() * (1 + 3/100);
    $setting          = Setting::first();
    $total            = \Cart::session(Auth::user()->id)->getSubTotal() * $setting->tax/100;
    $total_price_after_tax  = \Cart::session(Auth::user()->id)->getSubTotal() + $total;
    $order = Order::create([
        'city'                 => $req->city,
        'address'              => $req->address,
        'total_price_after_tax'=> $total_price_after_tax,
        'tax'                  =>  $setting->tax,
        'user_id'              => Auth::user()->id,
    ]);

    // Insert into order_meal table
    foreach (\Cart::session(Auth::user()->id)->getContent() as $product) {
      $OrderProdcut =   OrderProdcut::create([
            'price'                 => $product->price,
            'total_price'           => \Cart::getTotal(),
            'order_id'              => $order->id,
            'product_id'            => $product->id,
            'quantity'              => $product->quantity,
        ]);

    }
    \Cart::clear(); // امسح السيشن
    return response()->json([$order],200);
}

    public function my_order(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return response()->json([$orders],200);
    }

    public function order_delete($id){
        $orders = Order::findOrFail($id)->delete();
        return response()->json(['the order is deleted'],200);
}

}
