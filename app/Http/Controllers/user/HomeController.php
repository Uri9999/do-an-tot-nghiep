<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->ajax()) {
            if ($request->key == 'price') {
                $query = Product::orderBy('prod_price', 'desc');
            } else if ($request->key == 'new') {
                $query = Product::orderBy('id', 'desc');
            } else {
                $query = Product::orderBy('prod_name', 'desc');
            }
            $count = $query->count();
            $products = $query->skip($request->skip * $request->take)->take($request->take)->get();
            return response()->json([
                'data' => [
                    'categories' => $categories,
                    'products' => $products,
                    'total' => $count,
                    'key' => $request->key
                ],
                'status' => Response::HTTP_OK
            ]);
        }
        return view('user-.index')
            ->with('categories', $categories);
    }

    public function addCart(Request $request)
    {
        try {
            if ($request->ajax()) {
                $product = Product::find($request->data);
                Cart::firstOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'product_id' => $product->id
                    ],
                    [
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'total_price' => 1 * $product->prod_price
                    ]
                );
                $cart = Cart::where('user_id', Auth::id())->get();
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

    public function getViewCart(Request $request)
    {
        return view('user-.cart');
    }

    public function getCart(Request $request)
    {
        if ($request->ajax()) {
            $cart = Cart::where('user_id', Auth::id())->get();
            return response()->json([
                'data' => [
                    'cart' => $cart,
                ],
                'status' => Response::HTTP_OK
            ]);
        }

    }
}
