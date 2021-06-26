<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index_comments(){
        $comments = Comment::orderBy('id','desc')->paginate(3);
        return view('admins.comments.index_comment',compact('comments'));
    }

    public function show_comments($id){
        $comments = Comment::findOrFail($id);
        return view('admins.comments.show_comment',compact('comments'));
    }

    public function delete_comments($id){
        $comments = Comment::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_comment_message'));
    }
}
