<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'total_price',
        'charge_token',
        'user_id',
        'address',
        'coupon_code',
        'coupon_type',
        'coupon_value',
        'total_discount_amount',
    ];

    public function products() {
        return $this->hasMany('App\Models\Cart', 'transfer_id');
    }
}
