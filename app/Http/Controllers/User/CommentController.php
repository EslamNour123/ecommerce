<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    

    public function create_comment(CommentRequest $req){
        Comment::create([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $req->product_id,
        ]);
        return redirect()->back();
    }

    public function update_comment($id){
        $comment = Comment::findOrFail($id);
        return view('users.products.update_comment',compact('comment'));
    }

    public function update_comment_store(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);
        $comment->update([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
        ]);
        return redirect()->route('details_prodcut',$comment->product->slug)->with('message',Trans('site.update_comment'));
    }

    public function delete_comment($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back();
    }


    ///////////////////////// Sub Comments ///////////////////////////////////


    public function index_subcomment($id){
        $comment  = Comment::findOrFail($id); 
        $subComments = Comment::where('parent_id',$comment->id)->get();
        return view('users.products.subcomments.index_subcomments',compact('subComments','comment'));
    }

    public function create_subcomment(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);        
        $comments = Comment::create([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
            'parent_id'  => $comment->id,
        ]);
        return redirect()->back();
    }

    public function update_subcomment($id){
        $subcomment = Comment::findOrFail($id);        
        return view('users.products.subcomments.update_subcomment',compact('subcomment'));
    }

    public function update_subcomment_store(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);        
        $comment->update([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
        ]);
        return redirect()->route('index_subcomment',$comment->parent_id);
    }

    public function delete_subcomment($id){
        $comment = Comment::findOrFail($id)->delete();
        return redirect()->back();
    }
}