<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Attribute extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class,'product_attributes')->withPivot(['value_ar','value_en']);
    }
}
