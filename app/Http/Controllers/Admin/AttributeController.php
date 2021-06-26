<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Attribute;
use App\Http\Requests\AttributesRequest;

class AttributeController extends Controller
{
    public function index(Request $req){
        $search = $req->input('search');
        $attributes = Attribute::where('name_ar','LIKE',"%{$search}%")
        ->where('name_en','LIKE',"%{$search}%")->get();
        return view('admins.attributes.index',compact('attributes','search'));
    }

    public function create_attribute(){
        return view('admins.attributes.create_attribute');
    }


    public function create_attributes_store(AttributesRequest $req){
        Attribute::create($req->all());
        return redirect()->route('index_attribute')->with('message',Trans('site.create_message_attribute'));
    }


    public function update_attribute($id){
        $attributes = Attribute::findOrFail($id);
        return view('admins.attributes.update_attributes',compact('attributes'));
    }

    public function update_attributes_store(AttributesRequest $req, $id){
        $attributes = Attribute::findOrFail($id);
        $attributes->update($req->all());
        return redirect()->route('index_attribute')->with('message',Trans('site.update_message_attribute'));
    }

    public function delete_attributes($id){
        $attributes = Attribute::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_message_attribute'));
    }


    // public function create_details_attributes(DetailsAttributeRequest $req){

    // }

}
