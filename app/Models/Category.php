<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // protected $table = 'categories';
    // protected $guarded = [];
    protected $fillable = [
        'cate_name',
        'cate_slug',
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}
