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

Route::prefix('admin')->group(function () {
	Route::get('/home', 'Admin\HomeController@index')->name('home');

	// Authentication Routes...
	Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Admin\Auth\LoginController@login');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

	// Password Reset Routes...
	Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');

	// Users management Routes...
	Route::get('users', 'Admin\UserController@index')->name('users');
	Route::get('usersData', 'Admin\UserController@indexData')->name('users.data');
	Route::get('users/create', 'Admin\UserController@create')->name('users.create');
	Route::get('users/{user}', 'Admin\UserController@show')->name('users.show');
	Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
	Route::patch('users/{user}', 'Admin\UserController@update')->name('users.patch');
	Route::delete('users/{user}', 'Admin\UserController@destroy')->name('users.delete');
	Route::post('users', 'Admin\UserController@store')->name('users.store');

	// Images Management Routes...
	Route::get('images', 'Admin\ImageController@index')->name('images');
	Route::get('imagesData', 'Admin\ImageController@indexData')->name('images.data');
	Route::get('images/create', 'Admin\ImageController@create')->name('images.create');
	Route::post('images', 'Admin\ImageController@store')->name('images.store');
	Route::delete('images/{image}', 'Admin\ImageController@destroy')->name('images.delete');

});

Route::get('/{path?}', [
	'uses' => 'Web\HomeController@home',
	'as' => 'react',
	'where' => ['path' => '.*'],
]);
// Restfull guide
// /projects
// /projects/create
// /projects/{project}
// /projects <== post
// /projects/{project}/edit <== get
// /projects/{project} <== patch
// /projects/{project} <== delete