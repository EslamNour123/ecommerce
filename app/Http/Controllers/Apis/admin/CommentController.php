<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index_comments(){
        $comments = Comment::orderBy('id','desc')->paginate(3);
        return response()->json([$comments],200);
    }

    public function delete_comment($id){
        $comment = Comment::findOrFail($id)->delete();
        return response()->json(['the comment is deleted'],200);   
     }

}
