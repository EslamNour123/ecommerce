<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([

    'middleware' => 'api',
    'namespace' => 'Apis',
    'prefix' => 'auth'
    

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


################ Start Admin ############### 

Route::group(['namespace'=>'Apis\admin','middleware'=>['auth:api']],function(){

    /*
,'middleware'=>['auth:api']
    */

    //users
    route::get('index','UserController@index');
    route::post('create','UserController@create');
    route::post('update/{id}','UserController@update');
    route::post('delete/{id}','UserController@delete');
    Route::get('/logout',function(){
        Auth::logout();
      });

    //brand
    route::get('index','BrandController@index');
    route::post('create_brand','BrandController@create_brand');
    route::post('update_brand/{id}','BrandController@update_brand');
    route::post('delete_brand/{id}','BrandController@delete_brand');

    //categories
    route::get('index_category','CategoryController@index_category');
    route::post('create_category','CategoryController@create_category');
    route::post('update_category/{id}','CategoryController@update_category');
    route::post('delete_category/{id}','CategoryController@delete_category');

    //subcategory
    route::get('index_subcategory/{id}','CategoryController@index_subcategory');
    route::post('create_subcategory/{id}','CategoryController@create_subcategory');
    route::post('update_subcategory/{id}','CategoryController@update_subcategory');
    route::post('delete_subcategory/{id}','CategoryController@delete_subcategory');

    //comments
    route::get('index_comments','CommentController@index_comments');
    route::post('delete_comment/{id}','CommentController@delete_comment');

    //complaints
    route::get('index_complaints','ComplaintController@index_complaints');
    route::post('delete_complaints/{id}','ComplaintController@delete_complaints');

    //orders
    route::get('index_orders','OrderController@index_orders');
    route::post('delete_order/{id}','OrderController@delete_order');

    //products
    route::get('index_products','ProductController@index_products');
    route::post('create_product','ProductController@create_product');

    //settings
    route::get('index_settings','SettingController@index_settings');
    route::post('update_settings/{id}','SettingController@update_settings');

});


################ End Admin ############### 

################ Start User ############### 

Route::group(['namespace'=>'Apis\user','middleware'=>['auth:api']],function(){

    //products_category users
    route::get('product_category/{id}','CategoryController@product_category');
    route::get('low_price/{id}','CategoryController@low_price');
    route::get('high_price/{id}','CategoryController@high_price');
    route::get('brands/{id}','CategoryController@brands');

    //product
    route::get('index','IndexController@index');
    route::get('all_products','IndexController@all_products');

    //comment 
    route::post('create_comment','CommentController@create_comment');
    route::post('update_comment/{id}','CommentController@update_comment');
    route::post('delete_comment/{id}','CommentController@delete_comment');

    //subcomment
    route::get('index_subcomment/{id}','CommentController@index_subcomment');
    route::post('create_subcomment/{id}','CommentController@create_subcomment');
    route::post('update_subcomment/{id}','CommentController@update_subcomment');
    route::post('delete_subcomment/{id}','CommentController@delete_subcomment');

    //contact_us
    route::post('contact_us','Contact_usController@contact_us');

    //vendor dashboard

    //vendor order
    route::get('show_order_vendor','OrderController@show_order_vendor');
    route::get('details_order_vendor/{id}','OrderController@details_order_vendor');
    route::post('delete_order_vendor/{id}','OrderController@delete_order_vendor');

    //order user//
    route::post('add_order','OrderController@add_order');
    route::get('my_order','OrderController@my_order');
    route::get('order_delete/{id}','OrderController@order_delete');

    //profile
    route::post('update_profile/{id}','ProfileController@update_profile');
});

################ End User ############### 


