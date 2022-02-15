<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $fillable = ['name', 'product_id'];

    public function category() {
        return $this->belongsTo('App\Models\Product');
    }
}
