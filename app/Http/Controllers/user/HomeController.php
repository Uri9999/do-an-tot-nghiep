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
        $query = Product::where('view_count', '>=', 0);
        $specialProducts = Product::all()->random(3);
        $hotProducts = Product::all()->random(3);
        if ($request->ajax()) {
            if ($request->key == 'price') {
                $query = $query->orderBy('prod_price', 'desc');
            } else if ($request->key == 'new') {
                $query = $query->orderBy('id', 'desc');
            } else {
                $query = $query->orderBy('prod_name', 'desc');
            }
            if ($request->categoryId != null) {
                $query = $query->where('category_id', $request->categoryId);
            }
            $count = $query->count();
            $products = $query->skip($request->skip * $request->take)->take($request->take)->get();
            return response()->json([
                'data' => [
                    'categories' => $categories,
                    'products' => $products,
                    'total' => $count,
                    'key' => $request->key,
                    'specialProducts' => $specialProducts,
                    'hotProducts' => $hotProducts
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
                        'product_id' => $product->id,
                        'status' => Cart::UN_PAID
                    ],
                    [
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'total_price' => 1 * $product->prod_price,
                        'product_price' => $product->prod_price,
                        'product_img' => $product->prod_img,
                        'product_name' => $product->prod_name,
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
            $cart = Cart::with('product')
                ->where('user_id', Auth::id())
                ->where('status', Cart::UN_PAID)
                ->get();
            return response()->json([
                'data' => [
                    'cart' => $cart,
                ],
                'status' => Response::HTTP_OK
            ]);
        }
    }

    public function removeCart(Request $request)
    {
        try {
            if ($request->ajax()) {
                Cart::destroy($request->data);
                return response()->json([
                    'data' => [],
                    'message' => 'success',
                    'status' => Response::HTTP_OK
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
