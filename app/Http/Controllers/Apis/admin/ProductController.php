<?php

namespace App\Http\Controllers\Apis\Admin;

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

    public function index_products(){
        $products = Product::orderBy('id','desc')->paginate(5);
        return response()->json([$products],200);
    }

    public function create_product(ProductRequest $req){

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
        // dd($req->products);

        return response()->json([$products],200);
    }
}
