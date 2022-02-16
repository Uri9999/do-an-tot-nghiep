<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index() {
        return view('admin-lte.coupon.index')->with('coupons', Coupon::all());
    }
}
