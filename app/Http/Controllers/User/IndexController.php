<?php

namespace App\Http\Controllers\User;

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
        return view('users.products.index',compact('categories','products'));
    }

    public function search_products(Request $req){
        $search   = $req->input('search');
        $products = Product::where('name_ar','LIKE',"%{$search}%")
        ->orWhere('name_en','LIKE',"%{$search}%")
        ->get();
        
        return view('users.products.all_products',compact('products','search'));
    }

    public function details_prodcut($slug){
        $product   = Product::where('slug',$slug)->first();
        $products2  = Product::where('approved',true)->where('featured',true)->get();
        $attributes = Attribute::where('id','product_id')->get();
        $comments   = Comment::orderBy('id','desc')->paginate(5);
    
        $comment_count = Comment::where('parent_id',null)->count();
        return view('users.products.details_prodcut',compact('products2','product','attributes','comments','comment_count'));
    }

    public function all_products(){
        $products = Product::orderBy('id','desc')->where('approved',true)->get();
        return view('users.products.all_products',compact('products'));
    }
}