<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;


class OrderController extends Controller
{
    public function index_orders(){
        $orders = Order::orderBy('id','desc')->paginate(5);
        return response()->json([$orders],200);
    }

    public function delete_order($id){
        $orders = Order::findOrFail($id)->delete();
        return response()->json(['the order deleted'],200);
    }
}
