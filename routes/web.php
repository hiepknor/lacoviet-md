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
    return view('welcome');
});
Auth::routes();

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'namespace' => 'Backend'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});



Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController', ['except' => ['show']]);
//    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('products', 'ProductController', ['except' => ['show']]);
//    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('orders', 'OrderController', ['except' => ['show']]);
//    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

