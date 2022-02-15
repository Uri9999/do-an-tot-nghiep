<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with('products')->get();
        return view('admin-lte.category.index')->with('categories', $categories);
    }

    public function destroy($id) {
        
        Product::where('category_id', $id)->update([
            'category_id' => 0
        ]);
        Category::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('admin-lte.category.update')->with('category', Category::find($id));
    }
    public function update(CategoryStoreRequest $request, $id)
    {
        $category = Category::find($id);
        $category->cate_name = $request->cate_name;
        $category->cate_slug = str_slug($request->cate_slug);
        return redirect()->route('categoryList');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'cate_name' => $request->cate_name,
            'cate_slug' => str_slug($request->cate_slug)
        ]);
        return redirect()->route('categoryList');
    }

    public function create()
    {
        return view('admin-lte.category.create');
    }
}
