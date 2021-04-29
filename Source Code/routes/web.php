<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::post('/review/{product}', 'ReviewController@store')->name('review.store');
    Route::view('/checkout', 'client.checkout')->name('checkout');
    Route::get('/order', 'OrderController@index')->name('order.index');
    Route::get('/order/{order}', 'OrderController@show')->name('order.show');
    Route::post('/order', 'OrderController@store')->name('order.store');
});

Route::get('/', 'CategoryController@index')->name('home');
Route::get('/shop', 'ProductController@index')->name('product.index');
Route::get('/product/{product}', 'ProductController@show')->name('product.show');
Route::get('/cart', 'CartController@show')->name('cart.show');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{item_id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{item_id}', 'CartController@destroy')->name('cart.destroy');
Route::view('/product-details', 'client.product-details');


Auth::routes();

