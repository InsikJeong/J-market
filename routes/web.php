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
Route::resource('/goods','GoodsController');
Route::get('/fashions', [
    'as' => 'goods.fashions',
    'uses' => 'GoodsController@fashions',
]);
Route::get('/foods', [
    'as' => 'goods.foods',
    'uses' => 'GoodsController@foods',
]);
//C
Route::post('/goods/store', [
    'as' => 'goods.cre',
    'uses' => 'GoodsController@store',
]);
// Route::post('/goods/create', [
//     'as' => 'goods.cre',
//     'uses' => 'GoodsController@create',
// ]);

// 결제
Route::resource('/buy','BuyController');
//장바구니
Route::resource('/cart','CartController');
//장바구니 비우기
Route::post('/cart/all','CartController@allDel');
//검색
Route::post('/search', [
    'as' => 'search.index',
    'uses' => 'SearchController@index',
]);