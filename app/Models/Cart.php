<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    const PAID = 2;
    CONST UN_PAID = 1;

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
