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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});

//PHP/Laravel 09 Routingについて理解する

//課題３　http://XXXXXX.jp/XXX AAAControllerのbbbというAction に渡す
Route::get('XXX', 'AAAController@bbb');

/* 課題４【応用】admin/profile/create にアクセスしたら
ProfileController の add Action に、admin/profile/edit にアクセスしたら 
ProfileController の edit Action に割り当てるように設定してください。*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/edit', 'Admin\ProfileController@edit');
});