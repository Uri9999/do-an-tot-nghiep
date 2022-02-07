<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CateController extends Controller
{
    public function getProduct() {
        return view('admin.product');
    }
    public function getCate() {
        $categories = Category::all();
        return view('admin.category')->with('categories', $categories);
    }
    public function getEditProduct() {
        return view('admin.editproduct');
    }
    public function editCate($id) {
        $category = Category::findOrFail($id);
        return view('admin.editcategory')->with('category', $category);
    }
    public function addCate(Request $request) {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();

    }
    public function postEditCate(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect()->route('getCate');
    }

    public function deleteCate($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('getCate');
    }
}
