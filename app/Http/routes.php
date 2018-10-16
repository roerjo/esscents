<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
	return view('about');
});

Route::get('/success', function () {
	return view('success');
});

Route::get('/products', 'ProductController@index');

Route::get('/cart', 'CartController@index');
Route::post('/cart/{id}', 'CartController@addToCart');
Route::put('/cart/{id}', 'CartController@updateQuantity');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::post('/checkout', 'CartController@charge');


Route::get('/admin/login', 'Admin\AuthController@getLogin');
Route::post('/admin/login', 'Admin\AuthController@postLogin');
Route::get('/admin/logout', 'Admin\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/product/new', 'Admin\ProductController@newProduct');
	Route::get('/admin/products', 'Admin\ProductController@index');
	Route::get('/admin/product/destroy/{id}', 'Admin\ProductController@destroy');
	Route::post('/admin/product/save', 'Admin\ProductController@add');
	Route::get('/admin/product/edit/{id}', 'Admin\ProductController@show');
	Route::put('/admin/product/update/{id}', 'Admin\ProductController@update');
});
