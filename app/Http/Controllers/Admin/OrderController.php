<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index_orders(){
        $orders = Order::orderBy('id','desc')->paginate(5);
        return view('admins.orders.index_orders',compact('orders'));
    }

    public function show_orders($id){
        $orders = Order::findOrFail($id);
        return view('admins.orders.show_orders',compact('orders'));
    }


    public function delete_order($id){
        $orders = Order::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_order_message'));

    }

    public function cansel_order($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'cansel']);
        return redirect()->back();
    }

    public function done_order($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'done']);
        return redirect()->back();
    }

    public function waite_order($id){
        $orders = Order::FindOrFail($id)->update(['status'=>'waite']);
        return redirect()->back();
    }
}
