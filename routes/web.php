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

Route::get('/','Blog\ArticleController@index');

Route::view('/about', 'about')->name('about');
Route::view('/new', 'new')->name('new');
Route::view('/new_list', 'newlist')->name('new_list');
Route::view('/share', 'share')->name('share');
Route::group(['prefix'=>'article'],function(){
    Route::post('/like','Blog\ArticleController@like');
    Route::post('/reply','Blog\ArticleController@reply');
});
Route::resource('article', 'Blog\ArticleController');