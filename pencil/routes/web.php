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

Route::get('', 'TopController@index')->name('top');

Route::group(['middleware' => 'auth.very_basic'], function () {
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('login/callback', 'AuthController@callback')->name('callback');
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('draw', 'TopController@draw')->name('draw');
    Route::post('post', 'TwitterController@post')->name('post');
});
