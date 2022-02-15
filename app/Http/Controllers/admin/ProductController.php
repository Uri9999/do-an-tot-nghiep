<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        return view('admin-lte.product.index')->with('products', $products);
    }
}
