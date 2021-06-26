<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use Auth;
// use View;
// use App\Models\Category;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::first();  
        \View::share('setting',$setting);

        // if (Auth::check()) {
        //     $cart_items = \Cart::session(Auth::user()->id)->getContent();
        //     view::share('cart_items',$cart_items);
        // }
        // $categories = Category::get();
        // view::share('categories',$categories);
        
    }
}
