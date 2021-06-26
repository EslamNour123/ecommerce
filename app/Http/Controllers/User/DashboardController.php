<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Brand;
use App\Models\Attribute;

use App\Http\Requests\ProductRequest;
use App\Traits\ImageTraits;
use Auth;

class DashboardController extends Controller
{
    use ImageTraits;

    public function dashboard_vendor(){
        $products = Product::where('user_id',Auth::user()->id)->where('approved',true)->orderBy('id','desc')->paginate(8);
        return view('users.dashboard.product_dashbard',compact('products'));
    }



    public function create_product_vendor(){
        $subcategories = Category::whereNotNull('parent_id',)->get();
        $brands = Brand::get();
        $Attributes = Attribute::get();
        return view('users.dashboard.create_product_vendor',compact('Attributes','brands','subcategories'));  
    }

    public function create_product_store_vendor(ProductRequest $req){
        $products = Product::create([
            'name_ar'           => $req->name_ar,
            'name_en'           => $req->name_en,
            'content_ar'        => $req->content_ar,
            'content_en'        => $req->content_en,
            'price'             => $req->price,
            'descount'          => $req->descount,
            'slug'              => $req->name_ar,
            'approved'          => false,
            'quantity'          => $req->quantity,
            'user_id'           => Auth::user()->id,
            'category_id'       => $req->category_id,
            'brand_id'          => $req->brand_id,

        ]);
        // dd($req->$products);
        foreach($req->file('image') as $image){
            $image = $this->ImageTraits($image,'image_product');
            $images = Image::create([
                'image'      => $image,
                'product_id' => $products->id
            ]);
        }


        
        $value_counter = 0 ;
        $ar = [];
            foreach ($req->Attributes as $Attribute) {
                if (isset($req->value_ar[$value_counter]) && isset($req->value_en[$value_counter])) {
                    $ar[$Attribute]  = ['value_ar'=>$req->value_ar[$value_counter],'value_en'=>$req->value_en[$value_counter]];
                    $value_counter++;               
                
                } else 
                {
                   
                }

         }
 

         $products->attributes()->sync($ar);

        return redirect()->route('dashboard_vendor')->with('message',Trans('site.create_product_message'));
    }

    public function update_product_vendor($id){
        $products      = Product::findOrFail($id);
        $subcategories = Category::whereNotNull('parent_id',)->get();
        $Attributes    = Attribute::get();
        $brands        = Brand::get();
        return view('users.dashboard.update_product_vendor',compact('brands','products','subcategories','Attributes'));
    }

    public function update_product_vendor_store(ProductRequest $req, $id){
        $products = Product::findOrFail($id);
        $products->update([
            'name_ar'     => $req->name_ar,
            'name_en'     => $req->name_en,
            'content_ar'  => $req->content_ar,
            'content_en'  => $req->content_en,
            'price'       => $req->price,
            'descount'    => $req->descount,
            'slug'        => $req->name_ar,
            'quantity'    => $req->quantity,
            'user_id'     => Auth::user()->id,
            'category_id' => $req->category_id,
            'brand_id'    => $req->brand_id,

        ]);
        if($req->file('image')){
            $products->images()->delete();
            foreach($req->file('image') as $image){
                $file_name = $this->ImageTraits($image,'image_product');
                Image::create([
                    'image'      => $file_name,
                    'product_id' => $products->id
                ]);
            }
        }

        $value_counter = 0;
        $ar = [];
        foreach ($req->Attributes as $key => $Attributes) {
            if (isset($req->value_ar[$value_counter]) && isset($req->value_en[$value_counter])) {
                $ar[$Attributes] = ['value_ar'=>$req->value_ar[$value_counter],'value_en'=>$req->value_en[$value_counter]];
                $value_counter++;
            } else {

            }
            
            }

            $products->attributes()->sync($ar);
        


        return redirect()->route('dashboard_vendor')->with('message',Trans('site.update_product_message'));
    }

    public function delete_product_vendor($id){
        $products = Product::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_product_message'));
    }

    public function show_product_vendor($slug){
        $products = Product::where('slug',$slug)->first();
        return view('users.dashboard.show_product_vendor',compact('products'));
    }

    public function waite_product_list(){
        $products = Product::where('user_id',Auth::user()->id)->where('approved',false)->get();
        return view('users.dashboard.waite_product_list',compact('products'));
    }

}
