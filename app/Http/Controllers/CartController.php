<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('user.cart')->with('carts', $carts);
    }

    public function addCart(Request $request, $id)
    {
        Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $id
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $id,
                'user' => Auth::user()->name
            ]
        );        
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('user.cart')->with('carts', $carts);
    }

    public function deleteCart(Request $request, $id)
    {
        Cart::where('id', $id)->delete();
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('user.cart')->with('carts', $carts);
    }
}
