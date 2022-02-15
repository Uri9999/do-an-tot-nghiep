<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function getProd() {
        $products = Product::all();
        return view('admin.product')->with('products', $products);
    }
    public function getAddProd() {
        $categories = Category::all();
        return view('admin.addproduct')->with('categories', $categories);
    }
    public function addProd(Request $request) {
        for ( $i = 1; $i <= 18; $i++) {

        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_description = $request->description;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->category_id = $request->cate;
        
        // if ($files = $request->file('profile_image')) {
        //     // Define upload path
        //     $destinationPath = public_path('/profile_images/'); // upload path
        //     // Upload Orginal Image           
        //     $profileImage = date('YmdHis') . "." . $i . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $profileImage);
            
        //     $insert['image'] = "$profileImage";
        //     // Save In Database
		// 	$product->prod_img = "$profileImage";
        // }

        if ($request->hasFile('profile_image')) {
            $filename = uniqid() . $request->file('profile_image')->getClientOriginalName();
            $filename = str_replace(' ', '', $filename);
            $request->file('profile_image')->storeAs('public/profile_images', $filename);
            $product->prod_img = $filename;
        }
        
        $product->save();
        }
        return redirect()->route('getProd');
    }
    public function getEditProd($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.editproduct')->with('product', $product)
                                        ->with('categories', $categories);
    }
    public function editProd(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_description = $request->description;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->category_id = $request->cate;
        
        if ($files = $request->file('profile_image')) {
            // Define upload path
            $destinationPath = public_path('/profile_images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            
            $insert['image'] = "$profileImage";
            // Save In Database
			$product->prod_img = "$profileImage";
			// $product->save();
        }
        $product->save();
        return redirect()->route('getProd');

    }
    public function deleteProd($id) {
        $product = Product::destroy($id);
        return redirect()->route('getProd');
    }
}
