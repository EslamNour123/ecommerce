<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderProdcut;
use App\Models\Setting;
use Auth;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    //order vendor
    public function index_orders_vendor(){
        $orders   = Order::orderBy('id','desc')->paginate(5);
        return view('users.dashboard.order_vendor',compact('orders'));
    }

    public function show_orders_vendor($id){
        $orders = Order::findOrFail($id);
        return view('users.dashboard.show_order_vendor',compact('orders'));
    }

    public function delete_orders($id){
        $orders = Order::findOrFail($id)->delete();

        return redirect()->back()->with('message',Trans('site.delete_order_message'));
    }

    public function cansel($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'cansel']);
        return redirect()->back();
    }

    public function done($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'done']);
        return redirect()->back();
    }

    public function waite($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'waite']);
        return redirect()->back();
    }



    //order user normal

    public function create_order(){
        return view('users.cart.create_order');
    }

        public function add_order_store(OrderRequest $req){
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
            OrderProdcut::create([
                'price'                 => $product->price,
                'total_price'           => \Cart::getTotal(),
                'order_id'              => $order->id,
                'product_id'            => $product->id,
                'quantity'              => $product->quantity,
            ]);

        }
        \Cart::clear(); // امسح السيشن
        return redirect()->route('index')->with('message',Trans('site.message_order_create'));
    }


    public function my_order(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('users.cart.my_order',compact('orders'));
   }

   public function my_order_details($id){
    $order = Order::findOrFail($id);
    $order_products = OrderProdcut::where('order_id',$order->id)->get();
    return view('users.cart.details_order',compact('order','order_products'));
}


   public function order_delete($id){
    $orders = Order::findOrFail($id)->delete();
    return redirect()->back()->with('message',Trans('site.message_delete_order'));
}

   
}
