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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'ArticleController');
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts', 'ArticleController@index')->name('posts.index');
Route::get('posts/{slug}', 'ArticleController@show')->name('posts.show');