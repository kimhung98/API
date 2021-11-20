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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'Web\WebController@index')->name('home');
Route::get('/product/{id}', 'Web\WebController@getProduct')->name('home.product');
Route::post('/add-to-cart/{id}','Web\WebController@addToCart')->name('add.cart');
Route::get('/shopping-cart','Web\WebController@getShopingCart')->name('show.cart');
Route::post('/remove-item-cart/{id}','Web\WebController@destroyItemCart')->name('destroy.cart');
Route::post('/payment','Web\WebController@payment')->name('payment');

// login and logout
Route::get('/user/login','Web\WebController@getLogin')->name('user.login');
Route::post('/user/login','Web\WebController@postLogin')->name('user.login');
Route::get('user/logout','Web\WebController@getLogout')->name('user.logout');

// route khi login voi role admin or employee
Route::group(['prefix'=>'admin', 'middleware'=>'Admin'], function () {
    Route::get('/home','Admin\AdminController@index')->name('admin.home');

    Route::get('/user','Admin\AdminController@getUser')->name('admin.user.index');
    Route::get('/user/create','Admin\AdminController@createUser')->name('admin.user.create');
    Route::get('/user/edit/{id}','Admin\AdminController@editUser')->name('admin.user.edit');

    Route::get('/category','Admin\AdminController@getCategoy')->name('admin.category.index');
    Route::get('/category/create','Admin\AdminController@createCategoy')->name('admin.category.create');
    Route::get('/category/edit/{id}','Admin\AdminController@editCategoy')->name('admin.category.edit');

    Route::get('/product','Admin\AdminController@getProduct')->name('admin.product.index');
    Route::get('/product/create','Admin\AdminController@createProduct')->name('admin.product.create');
    Route::get('/product/edit/{id}','Admin\AdminController@editProduct')->name('admin.product.edit');

    Route::get('/supplier','Admin\AdminController@getSupplier')->name('admin.supplier.index');
    Route::get('/supplier/create','Admin\AdminController@createSupplier')->name('admin.supplier.create');
    Route::get('/supplier/edit/{id}','Admin\AdminController@editSupplier')->name('admin.supplier.edit');

    Route::get('/cart','Admin\AdminController@getCart')->name('admin.cart.index');
});
