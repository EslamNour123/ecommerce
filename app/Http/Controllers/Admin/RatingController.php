<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rating;

class RatingController extends Controller
{
    public function index_ratings(){
        $ratings = Rating::get();
        return view('admins.ratings.index_rating',compact('ratings'));
    }

    public function delete_ratings($id){
        $ratings = Rating::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_rating_message'));
    }
}
