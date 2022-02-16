<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code',
        'coupon_value',
        'type',
        'expired_date',
        'quantity',
    ];
}
