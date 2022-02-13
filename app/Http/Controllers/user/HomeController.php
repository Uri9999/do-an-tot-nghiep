<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if($request->ajax()) {
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

    public function dataIndex(Request $request)
    {
        dd(1);
        if($request->ajax()) {
            $categories = Category::all();
            return response()->json([
                'data' => [
                    'categories' => $categories,
                ],
                'status' => Response::HTTP_OK
            ]);
        }
    }
}
