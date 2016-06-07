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

Route::get('/products', 'MainController@index');

Route::get('/cart', 'CartController@index');
Route::post('/cart/{id}', 'CartController@addToCart');
Route::put('/cart/{id}', 'CartController@updateQuantity');
Route::delete('/cart/{id}', 'CartController@destroy');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@charge');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/product/new', 'ProductController@newProduct');
	Route::get('/admin/products', 'ProductController@index');
	Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
	Route::post('/admin/product/save', 'ProductController@add');
	Route::get('/admin/product/edit/{id}', 'ProductController@edit');
	Route::put('/admin/product/update/{id}', 'ProductController@update');
});

Route::get('/admin/login', 'Auth\AuthController@getLogin');
Route::post('/admin/login', 'Auth\AuthController@postLogin');
Route::get('/admin/logout', 'Auth\AuthController@getLogout');