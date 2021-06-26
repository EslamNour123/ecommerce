<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Traits\ImageTraits;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryDetailsRequest;


class CategoryController extends Controller
{
    use ImageTraits;

    //category

    public function index_category(){
        $categories = Category::orderBy('id','desc')->where('parent_id',null)->paginate(10);
        return response()->json([$categories],200);
    }

    public function create_category(CategoryRequest $req){

        $file_name = $this->ImageTraits($req->image,'image_categories');
        $categories = Category::create([
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
            'image'     => $file_name,
        ]);
        return response()->json([$categories],200);
    }

    public function update_category(CategoryRequest $req, $id){
        $categories = Category::findOrFail($id);
        $file_name = $this->ImageTraits($req->image,'image_categories');
        $categories->update([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
            'image' => $file_name
        ]);
        return response()->json([$categories],200);
    }

    public function delete_category($id){
        $categories = Category::findOrFail($id)->delete();
        return response()->json(['the category is deleted'],200);
    }

    //subcategory

    public function index_subcategory($id){
        $subcategories = Category::findOrFail($id);
        $categories = Category::where('parent_id',$subcategories->id)->get();
        return response()->json([$categories],200);
    }

    public function create_subcategory(CategoryDetailsRequest $req, $id){
         $category = Category::findOrFail($id);
        
        // dd($req->all());
        $subcategories = Category::create([  
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
            'parent_id' => $category->id
        ]);
        return response()->json([$subcategories],200);
    }

    public function update_subcategory(CategoryDetailsRequest $req, $id){
        $categories = Category::findOrFail($id);
        $categories->update([
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
        ]);
        return response()->json([$categories],200);
    }

    public function delete_subcategory($id){
        $categories = Category::findOrFail($id)->delete();
        return response()->json(['the subcategory is deleted'],200);
    }
}
