<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Admin\LoginController@showLoginForm');
Route::post('login', 'Admin\LoginController@login')->name('login');
Route::post('logout', 'Admin\LoginController@logout')->name('logout');


Route::middleware('auth:admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('home');

    //Categories Routes
    Route::get('/categories', 'CategoryController@adminIndex')->name('categories.index');
    Route::resource('/categories', 'CategoryController')->except(["index"]);

    //Products Routes
    Route::get('/products', 'ProductController@adminIndex')->name('products.index');
    Route::resource('/products', 'ProductController')->except(["index"]);

    //Notes Route
    Route::resource('/notes', 'NoteController');

    //Users Route
    Route::resource('/users', 'UserController');


    //Orders Route
    Route::get('/orders', 'OrderController@adminIndex')->name('orders.index');
    Route::get('/orders/{order}', 'OrderController@adminShow')->name('orders.show');
    Route::resource('/orders', 'OrderController')->except(["index", "show"]);
    Route::put('/orders/{order}/start', 'OrderController@start')->name('orders.start');
    Route::put('/orders/{order}/complete', 'OrderController@complete')->name('orders.complete');
    Route::get('/orders/type/{status}', 'OrderController@orderTypeShow')->name('orders.type.show');


//Admin Routes

    Route::view('/product/customize', 'admin.customize');
    Route::view('/reports', 'admin.reports');
    Route::view('/icons', 'admin.icons');
    Route::view('/maps', 'admin.maps');
    Route::view('/notifications', 'admin.notifications');
    Route::view('/table', 'admin.table');
    Route::view('/template', 'admin.template');
    Route::view('/typography', 'admin.typography');
    Route::view('/upgrade', 'admin.upgrade');
    Route::view('/user', 'admin.user');
});

