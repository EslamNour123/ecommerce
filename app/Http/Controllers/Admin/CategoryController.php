<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Traits\ImageTraits;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryDetailsRequest;


class CategoryController extends Controller
{
    use ImageTraits;

    ##### Genral Category

    public function index_category(){
        $categories = Category::orderBy('id','desc')->where('parent_id',null)->paginate(10);
        return view('admins.categories.index_category',compact('categories'));
    }

    public function create_category(){
        $parent_ids = Category::where('parent_id',null)->get();

        return view('admins.categories.create_category',compact('parent_ids'));
    }

    public function create_category_store(CategoryRequest $req){

        $file_name = $this->ImageTraits($req->image,'image_categories');
        $categories = Category::create([
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
            'image'     => $file_name,
        ]);
        return redirect()->route('index_category')->with('message',Trans('site.create_category_message'));
    }

    public function update_category($id){
        $categories = Category::findOrFail($id);
        return view('admins.categories.update_category',compact('categories'));
    }

    public function update_category_store(CategoryRequest $req, $id){
        $categories = Category::findOrFail($id);
        $file_name = $this->ImageTraits($req->image,'image_categories');
        $categories->update([
            'name_ar' => $req->name_ar,
            'name_en' => $req->name_en,
            'image' => $file_name
        ]);
        return redirect()->route('index_category')->with('message',Trans('site.update_category_message'));
    }
    
    public function delete_category($id){
        $categories = Category::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_category_message'));
    }



    #SubCategory

    public function index_subcategory($id){
        $subcategories = Category::findOrFail($id);
        $categories = Category::where('parent_id',$subcategories->id)->get();
        return view('admins.categories.subcategory.index_subcategory',compact('categories','subcategories'));
    }

    public function create_subcategory($id){
        $subcategories = Category::findOrFail($id);
        return view('admins.categories.subcategory.create_subcategory',compact('subcategories'));
    }

    public function create_subcategory_store(CategoryDetailsRequest $req, $id){
        $subcategories = Category::findOrFail($id);
        
        // dd($req->all());
        Category::create([  
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
            'parent_id' => $subcategories->id
        ]);
        return redirect()->route('index_subcategory',$id)->with('message',Trans('site.create_details_category_message'));
    }

    public function update_subcategory($id){
        $subcategories = Category::findOrFail($id);
        return view('admins.categories.subcategory.update_subcategory',compact('subcategories'));
    }

    
    public function update_subcategory_store(CategoryDetailsRequest $req, $id){
        $categories = Category::findOrFail($id);
        $categories->update([
            'name_ar'   => $req->name_ar,
            'name_en'   => $req->name_en,
        ]);
        return redirect()->route('index_subcategory',$id)->with('message',Trans('site.update_details_category_message'));
    }

    public function delete_subcategory($id){
        $categories = Category::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_details_category_message'));
    }

}
