<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => LaravelLocalization::setLocale(),	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

Auth::routes();

});
// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout',function(){
    Auth::logout();
    return redirect()->route('login');
  })->name('logout');
  

################ Admin ############### 

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    //Dashboard
    route::get('dashboard','DashboardController@dashboard')->name('dashboard');
    
    //Users
    route::get('index_user','UserController@index')->name('index_user');
    route::get('create_user','UserController@create_user')->name('create_user');
    route::post('create_user_store','UserController@create_user_store')->name('create_user_store');
    route::get('update_user/{id}','UserController@update_user')->name('update_user');
    route::post('update_user_store/{id}','UserController@update_user_store')->name('update_user_store');
    route::get('delete_user/{id}','UserController@delete_user')->name('delete_user');
    route::get('profile_admin','UserController@profile_admin')->name('profile_admin');
    route::post('update_profile_admin/{id}','UserController@update_profile_admin')->name('update_profile_admin');

    //categoreis
    route::get('index_category','CategoryController@index_category')->name('index_category');
    route::get('create_category','CategoryController@create_category')->name('create_category');
    route::post('create_category_store','CategoryController@create_category_store')->name('create_category_store');
    route::get('update_category/{id}','CategoryController@update_category')->name('update_category');
    route::post('update_category_store/{id}','CategoryController@update_category_store')->name('update_category_store');
    route::get('delete_category/{id}','CategoryController@delete_category')->name('delete_category');

    //Detalis Category
    route::get('index_subcategory/{id}','CategoryController@index_subcategory')->name('index_subcategory');
    route::get('create_subcategory/{id}','CategoryController@create_subcategory')->name('create_subcategory');
    route::post('create_subcategory_store/{id}','CategoryController@create_subcategory_store')->name('create_subcategory_store');
    route::get('update_subcategory/{id}','CategoryController@update_subcategory')->name('update_subcategory');
    route::post('update_subcategory_store/{id}','CategoryController@update_subcategory_store')->name('update_subcategory_store');
    route::get('delete_subcategory/{id}','CategoryController@delete_subcategory')->name('delete_subcategory');

    //products
    route::get('index_product','ProductController@index_product')->name('index_product');
    route::get('create_product','ProductController@create_product')->name('create_product');
    route::post('create_product_store','ProductController@create_product_store')->name('create_product_store');
    route::get('update_product/{id}','ProductController@update_product')->name('update_product');
    route::post('update_product_store/{id}','ProductController@update_product_store')->name('update_product_store');
    route::get('delete_product/{id}','ProductController@delete_product')->name('delete_product');
    route::get('show_product/{slug}','ProductController@show_product')->name('show_product');
    route::get('approved/{id}','ProductController@approved')->name('approved');
    route::get('cansel_product/{id}','ProductController@cansel_product')->name('cansel_product');
    route::get('featured/{id}','ProductController@featured')->name('featured');
    route::get('not_featured/{id}','ProductController@not_featured')->name('not_featured');

    //Attributes
    route::get('index_attribute','AttributeController@index')->name('index_attribute');
    route::get('create_attributes','AttributeController@create_attribute')->name('create_attribute');
    route::post('create_attributes_store','AttributeController@create_attributes_store')->name('create_attributes_store');
    route::get('update_attribute/{id}','AttributeController@update_attribute')->name('update_attribute');
    route::post('update_attributes_store/{id}','AttributeController@update_attributes_store')->name('update_attributes_store');
    route::get('delete_attributes/{id}','AttributeController@delete_attributes')->name('delete_attributes');

    //Brands
    route::get('index_brand','BrandController@index_brand')->name('index_brand');
    route::get('create_brand','BrandController@create_brand')->name('create_brand');
    route::post('create_brand_store','BrandController@create_brand_store')->name('create_brand_store');
    route::get('update_brand/{id}','BrandController@update_brand')->name('update_brand');
    route::post('update_brand_store/{id}','BrandController@update_brand_store')->name('update_brand_store');
    route::get('delete_brand/{id}','BrandController@delete_brand')->name('delete_brand');

        
    //complaints
    route::get('index_complaints','ComplaintController@index_complaints')->name('index_complaints');
    route::get('show_complaints/{id}','ComplaintController@show_complaints')->name('show_complaints');
    route::get('delete_complaints/{id}','ComplaintController@delete_complaints')->name('delete_complaints');

    //comments
    route::get('index_comments','CommentController@index_comments')->name('index_comments');
    route::get('show_comments/{id}','CommentController@show_comments')->name('show_comments');
    route::get('delete_comments/{id}','CommentController@delete_comments')->name('delete_comments');

    //ratings
    route::get('index_ratings','RatingController@index_ratings')->name('index_ratings');
    route::get('delete_ratings/{id}','RatingController@delete_ratings')->name('delete_ratings');

    //orders
    route::get('index_orders','OrderController@index_orders')->name('index_orders');
    route::get('show_orders/{id}','OrderController@show_orders')->name('show_orders');
    route::get('delete_order/{id}','OrderController@delete_order')->name('delete_order');
    route::get('cansel_order/{id}','OrderController@cansel_order')->name('cansel_order');
    route::get('done_order/{id}','OrderController@done_order')->name('done_order');
    route::get('waite_order/{id}','OrderController@waite_order')->name('waite_order');

    //settings
    route::get('index_settings','SettingController@index_settings')->name('index_settings');
    route::get('update_settings','SettingController@update_settings')->name('update_settings');
    route::post('update_settings_store/{id}','SettingController@update_settings_store')->name('update_settings_store');

  });
});






################# user #################

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth','block_user']],function(){
    
    //users
    route::get('update_profile/{id}','UserController@update_profile')->name('update_profile');
    route::post('settings/{id}','UserController@settings')->name('settings');


    Route::group(['middleware'=>['vendor']],function(){

    //vendor
    route::get('dashboard_vendor','DashboardController@dashboard_vendor')->name('dashboard_vendor');
    route::get('create_product_vendor','DashboardController@create_product_vendor')->name('create_product_vendor');
    route::post('create_product_store_vendor','DashboardController@create_product_store_vendor')->name('create_product_store_vendor');
    route::get('update_product_vendor/{id}','DashboardController@update_product_vendor')->name('update_product_vendor');
    route::post('update_product_vendor_store/{id}','DashboardController@update_product_vendor_store')->name('update_product_vendor_store');
    route::get('delete_product_vendor/{id}','DashboardController@delete_product_vendor')->name('delete_product_vendor');
    route::get('show_product_vendor/{slug}','DashboardController@show_product_vendor')->name('show_product_vendor');
    route::get('waite_product_list','DashboardController@waite_product_list')->name('waite_product_list');
   
    //order vendor
    route::get('index_orders_vendor','OrderController@index_orders_vendor')->name('index_orders_vendor');
    route::get('show_orders_vendor/{id}','OrderController@show_orders_vendor')->name('show_orders_vendor');
    route::get('delete_orders/{id}','OrderController@delete_orders')->name('delete_orders');
    route::get('cansel/{id}','OrderController@cansel')->name('cansel');
    route::get('done/{id}','OrderController@done')->name('done');
    route::get('waite/{id}','OrderController@waite')->name('waite');
    
  });

    //index
    route::get('index','IndexController@index')->name('index');
    route::get('search_products','IndexController@search_products')->name('search_products');    
    route::get('details_prodcut/{slug}','IndexController@details_prodcut')->name('details_prodcut');
    route::get('all_products','IndexController@all_products')->name('all_products');

    //comments
    route::post('create_comment','CommentController@create_comment')->name('create_comment');
    route::get('update_comment/{id}','CommentController@update_comment')->name('update_comment');
    route::post('update_comment_store/{id}','CommentController@update_comment_store')->name('update_comment_store');
    route::get('delete_comment/{id}','CommentController@delete_comment')->name('delete_comment');

    //subcomment
    route::get('index_subcomment/{id}','CommentController@index_subcomment')->name('index_subcomment');
    route::post('create_subcomment/{id}','CommentController@create_subcomment')->name('create_subcomment');
    route::post('create_subcomment_store/{id}','CommentController@create_subcomment_store')->name('create_subcomment_store');
    route::get('update_subcomment/{id}','CommentController@update_subcomment')->name('update_subcomment');
    route::post('update_subcomment_store/{id}','CommentController@update_subcomment_store')->name('update_subcomment_store');
    route::get('delete_subcomment/{id}','CommentController@delete_subcomment')->name('delete_subcomment');


    //category
    route::get('category/{id}','CategoryController@category')->name('category');
    route::get('ProductChilds/{id}','CategoryController@ProductChilds')->name('ProductChilds');
    route::get('low_price/{id}','CategoryController@low_price')->name('low_price');
    route::get('high_price/{id}','CategoryController@high_price')->name('high_price');
    route::get('brands/{id}','CategoryController@brands')->name('brands');

    //carts
    route::get('index_cart','ShoppingController@index_cart')->name('index_cart');
    route::post('add_cart/{id}','ShoppingController@add_cart')->name('add_cart');
    route::get('update_p/{id}','ShoppingController@update_p')->name('update_p');
    route::get('update_m/{id}','ShoppingController@update_m')->name('update_m');
    route::get('delete_cart/{id}','ShoppingController@delete_cart')->name('delete_cart');

    //order user normal
    route::get('create_order','OrderController@create_order')->name('create_order');
    route::post('add_order_store','OrderController@add_order_store')->name('add_order_store');
    route::get('my_order','OrderController@my_order')->name('my_order');
    route::get('my_order_details/{id}','OrderController@my_order_details')->name('my_order_details');
    route::get('order_delete/{id}','OrderController@order_delete')->name('order_delete');


    //contact_us
    route::get('contact_us','Contact_usController@contact_us')->name('contact_us');
    route::post('contact_us_store','Contact_usController@contact_us_store')->name('contact_us_store');

    //about 
    route::get('about','AboutController@about')->name('about');

  });
});

