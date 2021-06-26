<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::get();
        
        return response()->json([$brands],200);
    }

    public function create_brand(BrandRequest $req){
        $brand = Brand::create([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
        ]);
        return response()->json([$brand],200);
    }

    public function update_brand(BrandRequest $req, $id){
        $brand = Brand::findOrFail($id);
        $brand->update([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
        ]);
        return response()->json([$brand],200);
    }

    public function delete_brand($id){
        $brands = Brand::findOrFail($id)->delete();
        return response()->json(['the brand is deleted'],200);
    }

}
