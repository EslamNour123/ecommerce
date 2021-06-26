<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Comment;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('approved',true)->where('featured',true)->get();
        $categories = Category::where('parent_id',null)->get();
        return response()->json([$products],200);
    }

    public function all_products(){
        $products = Product::orderBy('id','desc')->where('approved',true)->get();
        return response()->json([$products],200);
    }

}
