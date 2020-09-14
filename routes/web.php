<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/about', 'about')->name('about');
Route::view('/new', 'new')->name('new');
Route::view('/new_list', 'newlist')->name('new_list');
Route::view('/share', 'share')->name('share');

//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login','LoginController@index',['as'=>'index']);
    Route::post('login','LoginController@login');
    Route::get('/','LoginController@index');
    Route::resource('article','ArticleController',['as'=>'article']);
});



//前端路由
Route::resource('article','Blog\ArticleController',['as'=>'article']);
