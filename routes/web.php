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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BlogController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//categories
Route::resource('/categories','CategoryController')->middleware('auth');

//tags
Route::resource('/tags','TagController')->middleware('auth');

//posts

Route::resource('/posts','PostController')->middleware('auth');

Route::get('/post/trashed','PostController@showDeletedItems')->middleware('auth')->name('trashed');
Route::get('/post/restore/{id}','PostController@restore')->middleware('auth')->name('restore');
Route::delete('/post/delete/{id}','PostController@forceDelete')->middleware('auth')->name('forceDelete');

Route::resource('/user','UserController')->middleware('auth');

// Route::get('/posts','PostController@count')->middleware('auth');
