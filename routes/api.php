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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', 'Apis\CategoryController@index');
    Route::get('/{category}', 'Apis\CategoryController@show');
    Route::get('/{category}/products', 'Apis\CategoryController@products');
    Route::post('/store', 'Apis\CategoryController@store');
    Route::put('/update/{category}', 'Apis\CategoryController@update');
    Route::delete('/delete/{category}', 'Apis\CategoryController@delete');
});

Route::group(['prefix' => 'products'], function(){
    Route::get('/', 'Apis\ProductController@index');
    Route::get('/{id}', 'Apis\ProductController@show');
    Route::post('/store', 'Apis\ProductController@store');
    Route::put('/update/{product}', 'Apis\ProductController@update');
    Route::delete('/delete/{product}', 'Apis\ProductController@delete');
});
