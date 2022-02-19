<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Coupon;
use App\User;
use App\Models\Transfer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index() 
    {
        return view('admin.index');
    }
    public function logout() 
    {
        Auth::logout();
        return redirect()->to('login');
    }

    public function test() 
    {
        return view('admin-lte.layout');
    }

    public function dashboard() 
    {
        $countProduct = Product::count();
        $countTransfer = Transfer::count();
        $countUser = User::where('role_id', User::ROLE_USER)->count();
        $countCoupon = Coupon::count();
        return view('admin-lte.dashboard')
            ->with('countProduct', $countProduct)
            ->with('countTransfer', $countTransfer)
            ->with('countUser', $countUser)
            ->with('countCoupon', $countCoupon);
    }
}
