<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProdcut extends Model
{
    protected $guarded = [];
    protected $table = 'order_products';

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
