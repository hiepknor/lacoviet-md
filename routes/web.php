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

Route::group([
    'namespace' => 'Frontend',
    'as' => 'frontend.'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Auth::routes();

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'namespace' => 'Backend',
    'as' => 'backend.'
], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('categories', 'CategoryController', ['except' => ['show']]);

    Route::post('products/uploadImg', ['as' => 'products.uploadImg', 'uses' => 'ProductController@uploadImg']);
    Route::resource('products', 'ProductController', ['except' => ['show']]);

    Route::resource('orders', 'OrderController', ['except' => ['show']]);

    Route::resource('users', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

