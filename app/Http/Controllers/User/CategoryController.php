<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class CategoryController extends Controller
{


    public function category($id){
        $category       = Category::findOrFail($id);
        $subcategories  = $category->childs->pluck('id')->all(); 
        $products       = Product::whereIn('category_id',$subcategories)->where('approved',true)->get();
        $brands         = Brand::get();
        return view('users.categories.category',compact('brands','category','products'));
    }

    public function ProductChilds($id){
        $category       = Category::findOrFail($id);
        $subcategories  = $category->childs->pluck('id')->all();
        $products       = Product::where('category_id',$category->id)->where('approved',true)->get();
        $brands         = Brand::get();
        // dd($category);
        return view('users.categories.ProductChilds',compact('brands','category','products'));
    }


    public function low_price($id){
        $category       = Category::findOrFail($id);
        $subcategories  = $category->childs->pluck('id')->all();
        $products       = Product::whereIn('category_id',$subcategories)->where('approved',TRUE)->orderBy('price','asc')->get();
        $brands         = Brand::get();
        return view('users.categories.low_price',compact('brands','category','products'));
    }

    public function high_price($id){
        $category      = Category::findOrFail($id);
        $subcategories =  $category->childs->pluck('id')->all();
        $products      = Product::whereIn('category_id',$subcategories)->where('approved',TRUE)->orderBy('price','desc')->get();
        $brands        = Brand::get();
        return view('users.categories.high_price',compact('brands','category','products'));
    }

    public function brands($id){
        $category    = Category::findOrFail($id);
        $subcategories = $category->childs->pluck('id')->all();
        $brands        = Brand::findOrFail($id);
        $products      = Product::whereIn('category_id',$subcategories)->where('approved',TRUE)->
        where('brand_id',$brands->id)->get();
        return view('users.categories.brands',compact('brands','category','products'));
    }
}
