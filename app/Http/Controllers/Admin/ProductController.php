<?php

namespace App\Http\Controllers\Admin;

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



class ProductController extends Controller
{
    use ImageTraits;

    public function index_product(Request $req){
        $search = $req->input('search');
        $products = Product::orderBy('id','desc')
        ->orWhere('name_ar','LIKE',"%{$search}%")
        ->orWhere('name_en','LIKE',"%{$search}%")
        ->paginate(5);
        $brands = Brand::get();
        return view('admins.products.index_product',compact('products','brands','search'));
    }

    public function create_product(){
        $subcategories = Category::whereNotNull('parent_id')->get();
        $brands = Brand::get();
        $Attributes = Attribute::get();
        return view('admins.products.create_product',compact('Attributes','brands','subcategories'));
   
    }

    public function create_product_store(ProductRequest $req){

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
        return redirect()->route('index_product')->with('message',Trans('site.create_product_message'));
    }

    public function update_product($id){
        $products = Product::findOrFail($id);
        $subcategories = Category::whereNotNull('parent_id')->get();
        $Attributes = Attribute::get();
        $brands = Brand::get();
        return view('admins.products.update_product',compact('products','subcategories','brands','Attributes'));
    }

    public function update_product_store(ProductRequest $req, $id){
        $products = Product::findOrFail($id);
        $products->update([
            'name_ar'           => $req->name_ar,
            'name_en'           => $req->name_en,
            'content_ar'        => $req->content_ar,
            'content_en'        => $req->content_en,
            'price'             => $req->price,
            'descount'          => $req->descount,
            'slug'              => $req->name_en,
            'quantity'          => $req->quantity,
            'user_id'           => Auth::user()->id,
            'category_id'       => $req->category_id,
            'brand_id'          => $req->brand_id,

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

        $value_counter = 0 ; 
        $ar = [];
        foreach ($req->Attributes as $Attribute) {
            if (isset( ($req->value_ar[$value_counter])) && isset(($req->value_en[$value_counter]))) {
                $ar[$Attribute]  = ['value_ar'=>$req->value_ar[$value_counter],'value_en'=>$req->value_en[$value_counter]];
                $value_counter++;
            } 
            else {

            }
        }
        $products->attributes()->sync($ar);

        return redirect()->route('index_product')->with('message',Trans('site.update_product_message'));
    }

    public function delete_product($id){
        $products = Product::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_product_message'));
    }

    public function show_product($slug){
        $products = Product::where('slug',$slug)->first();
        return view('admins.products.show_product',compact('products'));
    }

    public function approved($id){
        Product::findOrFail($id)->update(['approved'=>True]);
        return redirect()->back();
    }

    public function cansel_product($id){
        Product::findOrFail($id)->update(['approved'=>false]);
        return redirect()->back();
    }

    public function featured($id){
        $products = Product::findOrFail($id)->update(['featured'=>True]);
        return redirect()->back();
    }

    public function not_featured($id){
        $products = Product::findOrFail($id)->update(['featured'=>False]);
        return redirect()->back();
    }
}
