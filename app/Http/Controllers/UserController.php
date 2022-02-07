<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use Auth;

class UserController extends Controller
{
    public function getHome() {
        $data['featured'] = Product::where('featured' ,1)->take(10)->orderBy('id', 'desc')->get();
        
        $data['cate_1'] = Product::where('category_id', 1)->take(8)->orderBy('id', 'desc')->get();
        $data['cate_2'] = Product::where('category_id', 2)->take(8)->orderBy('id', 'desc')->get();
        $data['cate_3'] = Product::where('category_id', 3)->take(8)->orderBy('id', 'desc')->get();

        return view('user.home', $data);
    }

    public function getDetail(Request $request, $id) {
        $product = Product::findOrFail($id);
        $comments = Comment::where('product_id', $id)->orderBy('id', 'desc')->get(); 

        if(Session::get('id') !== $id) {
            $product = Product::findOrFail($id);
            $product->increment('view_count');
            Session::put('id', $id);
        }

        return view('user.detail')->with('product', $product)
                                ->with('comments', $comments);;
    }
    public function getCategory($id) {
        $category = Category::find($id);
        $products = Category::findOrFail($id)->products()->paginate(8);
        return view('user.category-prod')->with('products', $products)
            ->with('category', $category);
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('login');
    }
    public function getSearch(Request $request) {
        $k = $request->input('key');
        $k = str_replace(' ', '%', $k);
        $products = Product::where('prod_name', 'like', '%'.$k.'%')->paginate(8);
       

        return view('user.search')
                ->with('products', $products);

    }
}
