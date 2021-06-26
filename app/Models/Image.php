<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Porduct;

class Image extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
