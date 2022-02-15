<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'prod_name',
        'prod_slug',
        'prod_price',
        'prod_img',
        'prod_description',
        'featured',
        'status',
        'category_id',
        'view_count',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'product_id');
    }
    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }

    public function products() {
        return $this->hasMany('App\Models\ImageProduct', 'product_id');
    }
}
