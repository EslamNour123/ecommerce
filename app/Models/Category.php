<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Category;

class Category extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function childs(){
        return $this->hasMany(Category::class,'parent_id');

    }
    
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

}
