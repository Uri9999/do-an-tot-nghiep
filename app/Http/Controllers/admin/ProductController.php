<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\Cart;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        return view('admin-lte.product.index')->with('products', $products);
    }

    public function create(Request $request)
    {
        return view('admin-lte.product.create')
            ->with('categories', Category::all());
    }

    public function store(ProductStoreRequest $request)
    {
        $product = new Product;
        $product->prod_name = $request->prod_name;
        $product->prod_slug = str_slug($request->prod_name);
        $product->prod_price = $request->prod_price;
        $product->prod_description = $request->prod_description;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if ($files = $request->file('prod_img')) {
            // Define upload path
            $destinationPath = public_path('/profile_images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            
            $insert['image'] = "$profileImage";
            // Save In Database
			$product->prod_img = "$profileImage";
        }
        $product->save();
        return redirect()->route('productList');
    }

    public function destroy(Request $request, $id)
    {
        Product::destroy($id);
        Cart::where('product_id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('admin-lte.product.update')
            ->with('categories', Category::all())
            ->with('product', Product::find($id));
    }

    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::find($id);
        $product->prod_name = $request->prod_name;
        $product->prod_slug = str_slug($request->prod_name);
        $product->prod_price = $request->prod_price;
        $product->prod_description = $request->prod_description;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if ($files = $request->file('prod_img')) {
            // Define upload path
            $destinationPath = public_path('/profile_images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            
            $insert['image'] = "$profileImage";
            // Save In Database
			$product->prod_img = "$profileImage";
        }
        $product->save();
        return redirect()->route('productList');
    }
}
