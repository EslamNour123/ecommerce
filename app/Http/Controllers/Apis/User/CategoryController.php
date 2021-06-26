<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class CategoryController extends Controller
{
    public function product_category($id){
        $category       = Category::findOrFail($id);
        $subcategories  = $category->childs->pluck('id')->all(); 
        $products       = Product::whereIn('category_id',$subcategories)->where('approved',true)->get();
        return response()->json([$products],200);
    }

    public function low_price($id){
        $category       = Category::findOrFail($id);
        $subcategories  = $category->childs->pluck('id')->all();
        $products       = Product::whereIn('category_id',$subcategories)->where('approved',TRUE)->orderBy('price','asc')->get();
        return response()->json([$products],200);
    }

    public function high_price($id){
        $category      = Category::findOrFail($id);
        $subcategories =  $category->childs->pluck('id')->all();
        $products      = Product::whereIn('category_id',$subcategories)->where('approved',TRUE)->orderBy('price','desc')->get();
        return response()->json([$products],200);
    }

    public function brands($id){
        $brands    = Brand::findOrFail($id);
        $products      = Product::where('approved',TRUE)->
        where('brand_id',$brands->id)->get();
        return response()->json([$products],200);
    }
}
