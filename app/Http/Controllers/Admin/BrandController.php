<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    
    public function index_brand(Request $req){
        $search = $req->input('search');
        $brands = Brand::where('name_ar','LIKE',"%{$search}%")
        ->orWhere('name_en','LIKE',"%{$search}%")->get();
        
        return view('admins.brands.index_brand',compact('brands','search'));
    }


    public function create_brand(){
        return view('admins.brands.create_brand');
    }

    public function create_brand_store(BrandRequest $req){
        $brands = Brand::create([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
        ]);
        return redirect()->route('index_brand')->with('message',Trans('site.create_brand_message'));
    }

    public function update_brand($id){
        $brands = Brand::findOrFail($id);
        return view('admins.brands.update_brand',compact('brands'));
    }

    public function update_brand_store(BrandRequest $req, $id){
        $brands = Brand::findOrFail($id);
        $brands->update([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
        ]);
        return redirect()->route('index_brand')->with('message',Trans('site.update_brand_message'));
    }

    public function delete_brand($id){
        $brands = Brand::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_brand_message'));
    }
}
