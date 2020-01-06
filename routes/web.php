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
    $goods = \App\Goods::get();

    return view('main.index',compact('goods'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//상품들
Route::resource('/fashions','FashionsController');

// 결제
Route::resource('/buy','BuyController');
//장바구니
Route::resource('/cart','CartController');
