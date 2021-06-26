<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{

    //comment

    public function create_comment(CommentRequest $req){
       $comment = Comment::create([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $req->product_id,
        ]);
        return response()->json([$comment],200);
    }

    public function update_comment(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);
        $comment->update([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
        ]);
        return response()->json([$comment],200);
    }

    public function delete_comment($id){
        Comment::findOrFail($id)->delete();
        return response()->json(['the comment is deleted'],200);
    }

    //subcomment

    public function index_subcomment($id){
        $comment  = Comment::findOrFail($id); 
        $subComments = Comment::where('parent_id',$comment->id)->get();
        return response()->json([$subComments],200);
    }

    public function create_subcomment(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);        
        $comments = Comment::create([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
            'parent_id'  => $comment->id,
        ]);
        return response()->json([$comments],200);
    }

    public function update_subcomment(CommentRequest $req, $id){
        $comment = Comment::findOrFail($id);        
        $comment->update([
            'content'    => $req->content,
            'user_id'    => Auth::user()->id,
            'product_id' => $comment->product->id,
        ]);
        return response()->json([$comment],200);
    }

    public function delete_subcomment($id){
        Comment::findOrFail($id)->delete();
        return response()->json(['the subcomment is deleted'],200);
    }

}
