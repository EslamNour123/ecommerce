<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Attribute;
use App\Models\Cart;

class Product extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class,'product_attributes')->withPivot(['value_ar','value_en']);
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_products');
    }
}
