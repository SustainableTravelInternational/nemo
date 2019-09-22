<?php

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

Route::post('user/login', 'API\Auth\LoginController@login');
Route::post('user/register', 'API\Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {
	Route::get('user/details', 'API\UserController@details');
	Route::post('photoes', 'API\PhotoesController@store');

});

Route::get('photos', 'API\PhotoController@index');
Route::get('categories', 'API\CategoryController@index');