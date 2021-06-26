<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Complaint;
use App\Models\Attribute;
use App\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $products    = Product::get();
        $attributes  = Attribute::get();
        $users       = User::where('role','admin');
        $users_norml = User::where('role','user');
        $users_vendor= User::where('role','vendor');
        $categories  = Category::get();
        $comments    = Comment::get();
        $images      = Image::get();
        $ratings     = Rating::get();
        $orders      = Order::get();
        $complraints = Complaint::get();
        $brands      = Brand::get();
        return view('admins.dashboard',compact(
            'products',
            'attributes',
            'users',
            'users_norml',
            'users_vendor',
            'categories',
            'comments',
            'images',
            'ratings',
            'orders',
            'complraints',
            'brands',
        ));
    }
}
