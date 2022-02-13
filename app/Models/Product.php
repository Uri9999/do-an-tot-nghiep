<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'product_id');
    }
    // public function carts(){
    //     return $this->hasMany('App\Models\Cart');
    // }
}
