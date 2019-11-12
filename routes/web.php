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
Auth::routes();



Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{article}', 'ArticleController@show');
Route::get('/tag/{tag_id}', 'ArticleController@tag_show');

Route::post('/comments/{id}', 'CommentController@store');

Route::get('/tags/create', 'TagController@create');
Route::post('/tags', 'TagController@store');
Route::delete('/tags/{tag}', 'TagController@destroy');


Route::get('/articleadmin', 'ArticleadminController@index');
Route::get('/articleadmin/create', 'ArticleadminController@create');
Route::post('/articleadmin', 'ArticleadminController@store');
Route::get('/articleadmin/{article}', 'ArticleadminController@show');
Route::get('/articleadmin/{article}/edit', 'ArticleadminController@edit');
Route::patch('/articleadmin/{article}', 'ArticleadminController@update');
Route::delete('/articleadmin/{article}', 'ArticleadminController@destroy');


Route::get('/{any}', 'AppController@index')->where('any', '.*');


//Route::get('/home', 'HomeController@index')->name('home');
