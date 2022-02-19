<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::where('user_id', Auth::id())->get();
        return view('user-.transer-index')->with('transfers', $transfers);
    }

    public function show($id)
    {
        $transfer = Transfer::with('carts')->where('id', $id)
            ->first();
            // dd($transfer);
        return view('user-.transfer-detail')->with('transfer', $transfer);
    }
}
