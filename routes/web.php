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

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
//});

//PHP/Laravel 13
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
});

//PHP/Laravel 09 Routingについて理解する

//課題３　http://XXXXXX.jp/XXX AAAControllerのbbbというAction に渡す
//Route::get('XXX', 'AAAController@bbb');

/* 課題４【応用】admin/profile/create にアクセスしたら
ProfileController の add Action に、admin/profile/edit にアクセスしたら 
ProfileController の edit Action に割り当てるように設定してください。*/

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
//});

//PHP/Laravel 13 課題３
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
});

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
//});

//PHP/Laravel 13 課題６
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
