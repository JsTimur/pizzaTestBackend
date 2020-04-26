<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group( function() {
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::get('categories', 'CategoryController@getList');
Route::get('products', 'ProductController@getList');
Route::get('config', 'ConfigController@getConfig');
Route::post('order', 'OrderController@saveOrder');
Route::post('orderHistory', 'OrderController@history');
