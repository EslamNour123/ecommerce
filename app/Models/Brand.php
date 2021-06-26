<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Brand extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->hasMany(Prodcut::class);
    }
}
