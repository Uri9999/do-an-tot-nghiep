<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-manager', 'AdminController@test');

Route::get('/logout', 'HomeController@logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/logout', 'AdminController@logout')->name('logout');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CateController@getCate')->name('getCate');
        Route::post('/addCate', 'CateController@addCate')->name('addCate');

        Route::get('/editCate/{id}', 'CateController@editCate')->name('editCate');
        Route::post('/editCate/{id}', 'CateController@postEditCate')->name('postEditCate');

        Route::get('/deleteCate/{id}', 'CateController@deleteCate')->name('deleteCate');
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'ProductController@getProd')->name('getProd');
        
        Route::get('/addProd', 'ProductController@getAddProd')->name('getAddProd');
        Route::post('/addProd', 'ProductController@addProd')->name('addProd');

        Route::get('/editProd/{id}', 'ProductController@getEditProd')->name('getEditProd');
        Route::post('/editProd/{id}', 'ProductController@editProd')->name('editProd');

        Route::get('/deleteProd/{id}', 'ProductController@deleteProd')->name('deleteProd');
    });

});

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'role:user']], function(){
    Route::get('/', 'UserController@getHome')->name('getHome');
    Route::get('/contact', 'HomeController@getContact')->name('getContact');

    Route::group(['prefix' => 'detail'], function(){
        Route::get('/{id}', 'UserController@getDetail')->name('getDetail');

        Route::post('/addComment', 'CommentController@addComment')->name('addComment');

    });
    Route::group(['prefix' => 'cart'], function() {
        Route::get('addCart/{id}', 'CartController@addCart')->name('addCart');
        Route::get('getCart', 'CartController@getCart')->name('getCart');
        Route::get('deleteCart/{id}', 'CartController@deleteCart')->name('deleteCart');
    });
    
    Route::get('/logout', 'UserController@logout')->name('logOut');
    Route::get('/product-category/{id}', 'UserController@getCategory')->name('prod-cate');

    Route::get('/search', 'UserController@getSearch')->name('search');

});
Route::get('/abc', function(){
    return view('user.search');
});

Route::get('/aa', function(){
    return view('user.cart');
});


Route::get('/login-google', 'Auth\SocialLoginController@redirectToGoogle')->name('login-google');
Route::get('/socialite-login/google', 'Auth\SocialLoginController@processLoginGoogle');

Route::get('/login-facebook', 'Auth\SocialLoginController@redirectToFacebook')->name('login-facebook');
Route::get('/socialite-login/facebook', 'Auth\SocialLoginController@processLoginFacebook');


Route::group(['prefix' => 'admin-manager', 'middleware' => ['auth', 'role:admin']], function() {
    // Route::get('/', 'admin/HomeController')->name('home');
    Route::get('users', 'admin\UserController@index')->name('users');
    Route::get('block/{id}', 'admin\UserController@block')->name('block');
    Route::get('update/{id}', 'admin\UserController@update')->name('updateUser');
});

Route::group(['prefix' => 'home-user'], function() {
    Route::get('/', 'user\HomeController@index')->name('getHomeIndex');
    Route::get('/data-index', 'user\HomeController@dataIndex')->name('getDataIndex');

});