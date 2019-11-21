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



Route::get('/articles', 'ArticleController@index')->name('article.index');
Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');
Route::get('/tag/{tag_id}', 'ArticleController@tag_show')->name('tag.show');

Route::post('/comments/{id}', 'CommentController@store')->name('comment.store');

Route::get('/tags/create', 'TagController@create')->name('tags.create');
Route::post('/tags', 'TagController@store')->name('tags.store');
Route::delete('/tags/{tag}', 'TagController@destroy')->name('tags.destroy');


Route::get('/articleadmin', 'ArticleadminController@index')->name('articleadmin.index');
Route::get('/articleadmin/create', 'ArticleadminController@create')->name('articleadmin.create');
Route::post('/articleadmin', 'ArticleadminController@store')->name('articleadmin.store');
Route::get('/articleadmin/deleted', 'ArticleadminController@index_deleted')->name('articleadmin.index_deleted');
Route::get('/articleadmin/deleted/{article}', 'ArticleadminController@show_deleted')->name('articleadmin.show_deleted');
Route::get('/articleadmin/{article}', 'ArticleadminController@show')->name('articleadmin.show');
Route::get('/articleadmin/{article}/edit', 'ArticleadminController@edit')->name('articleadmin.edit');

Route::patch('/articleadmin/{article}', 'ArticleadminController@update')->name('articleadmin.update');
Route::patch('/articleadmin/deleted/{article}', 'ArticleadminController@restore_deleted')->name('articleadmin.restore_deleted');
Route::delete('/articleadmin/{article}', 'ArticleadminController@destroy')->name('articleadmin.destroy');
Route::delete('/articleadmin/deleted/{article}', 'ArticleadminController@forceDelete_deleted')->name('articleadmin.forceDelete_deleted');


Route::get('/{any}', 'AppController@index')->where('any', '.*');


//Route::get('/home', 'HomeController@index')->name('home');
