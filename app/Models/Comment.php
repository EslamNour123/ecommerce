<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Product;
use App\Models\Comment;

class Comment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function childs(){
        return $this->hasMany(Comment::class,'parent_id');

    }
    
    public function parent(){
        return $this->belongsTo(Comment::class,'parent_id');
    }
}
