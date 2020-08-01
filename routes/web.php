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

# Admin default page
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->group(function () {
    # User routes
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::post('/users', 'UserController@store')->name('user.store');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::get('/users/{user}', 'UserController@show')->name('user.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/users/{user}', 'UserController@update')->name('user.update');
    Route::get('/users/{user}/delete', 'UserController@destroy')->name('user.delete');

    # Article routes
    Route::get('/articles', 'ArticleController@index')->name('article.index');
    Route::post('/articles', 'ArticleController@store')->name('article.store');
    Route::get('/articles/create', 'ArticleController@create')->name('article.create');
    Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::put('/articles/{article}', 'ArticleController@update')->name('article.update');
    Route::get('/articles/{article}/delete', 'ArticleController@destroy')->name('article.delete');

    # Tag routes
    Route::get('/tags', 'TagController@index')->name('tag.index');
    Route::post('/tags', 'TagController@store')->name('tag.store');
    Route::get('/tags/create', 'TagController@create')->name('tag.create');
    Route::get('/tags/{tag}', 'TagController@show')->name('tag.show');
    Route::get('/tags/{tag}/edit', 'TagController@edit')->name('tag.edit');
    Route::put('/tags/{tag}', 'TagController@update')->name('tag.update');
    Route::get('/tags/{tag}/delete', 'TagController@destroy')->name('tag.delete');
});
