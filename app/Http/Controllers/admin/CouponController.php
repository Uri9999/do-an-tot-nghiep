<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Requests\CouponStoreRequest;


class CouponController extends Controller
{
    public function index() {
        return view('admin-lte.coupon.index')->with('coupons', Coupon::all());
    }

    public function create() {
        return view('admin-lte.coupon.create');
    }

    public function store(CouponStoreRequest $request)
    {
        $coupon = new Coupon();
        $coupon->fill($request->all());
        $coupon->save();
        return redirect()->route('couponList');
    }

    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('admin-lte.coupon.update')->with('coupon', Coupon::find($id));
    }

    public function update(CouponStoreRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->fill($request->all());
        $coupon->save();
        return redirect()->route('couponList');
    }
}
