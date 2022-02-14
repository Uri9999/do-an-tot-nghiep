<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function getDetail(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $specialProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->get()->random(3);
            return view('user-.detail')
                ->with('product', $product)
                ->with('specialProducts', $specialProducts);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCart(Request $request)
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())->get();
        return view('user-.cart')->with('cart', $cart);
    }

    public function addCart(Request $request)
    {
        Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->productId
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $request->productId,
                'total_price' => $request->quantity_detail
            ]
        );
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())->get();
        return view('user-.cart')->with('cart', $cart);
    }

    public function removeCartProduct(Request $request, $id)
    {
        Cart::destroy($id);
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())->get();
        return redirect()->back()->with('cart', $cart);
    }

    public function updateCart(Request $request)
    {
        try {
            if ($request->ajax()) {
                $cart = Cart::with('product')->where('id', $request['data']['cartId'])->first();
                Cart::where('id', $request['data']['cartId'])
                    ->update([
                        'quantity' => $request['data']['quantity'],
                        'total_price' => $request['data']['quantity'] * $cart->product->prod_price
                    ]);
                return response()->json([
                    'data' => [
                        'cart' => $cart,
                    ],
                    'status' => Response::HTTP_OK
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCheckout(Request $request)
    {
        $specialProducts = Product::all()->random(3);
        return view('user-.checkout')->with('specialProducts', $specialProducts);
    }

    public function checkout(Request $request)
    {
        return view('user-.checkout')->with('specialProducts', $specialProducts);
    }
}
