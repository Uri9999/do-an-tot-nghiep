<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;

class OrderController extends Controller
{
    public function index(Request $request) 
    {
        return view('admin-lte.order.index')->with('transfers', Transfer::with('user')->get());
    }

    public function show($id)
    {
        $transfer = Transfer::with(['carts' => function ($query) {
            return $query->with(['product']);
        }])->find($id);
        return view('admin-lte.order.detail')->with('transfer', $transfer);
    }
}
