<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Complaint extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
