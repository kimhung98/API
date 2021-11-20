<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//khai báo đường dẫn api-->r a
Route::get('user', 'Admin\UserController@index')->name('user.index');
Route::get('user/{id}', 'Admin\UserController@show')->name('user.show');
Route::post('user', 'Admin\UserController@store')->name('user.store');
Route::put('user/{id}', 'Admin\UserController@update')->name('user.update');
Route::delete('user/{id}', 'Admin\UserController@destroy')->name('user.destroy');

Route::get('category', 'Admin\CategoryController@index')->name('category.index');
Route::get('category/{id}', 'Admin\CategoryController@show')->name('category.show');
Route::post('category', 'Admin\CategoryController@store')->name('category.store');
Route::put('category/{id}', 'Admin\CategoryController@update')->name('category.update');
Route::delete('category/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');

Route::get('product', 'Admin\ProductController@index')->name('product.index');
Route::get('product/{id}', 'Admin\ProductController@show')->name('product.show');
Route::post('product', 'Admin\ProductController@store')->name('product.store');
Route::put('product/{id}', 'Admin\ProductController@update')->name('product.update');
Route::delete('product/{id}', 'Admin\ProductController@destroy')->name('product.destroy');

Route::get('supplier', 'Admin\SupplierController@index')->name('supplier.index');
Route::get('supplier/{id}', 'Admin\SupplierController@show')->name('supplier.show');
Route::post('supplier', 'Admin\SupplierController@store')->name('supplier.store');
Route::put('supplier/{id}', 'Admin\SupplierController@update')->name('supplier.update');
Route::delete('supplier/{id}', 'Admin\SupplierController@destroy')->name('supplier.destroy');

Route::get('cart', 'Admin\CartController@index')->name('cart.index');
Route::post('cart', 'Admin\CartController@store')->name('cart.store');

Route::get('product/by/{category}', 'Web\WebController@showProductInCategory')->name('web.product.show');
