<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', 'BookController@home');
Route::resource('book', 'BookController');

Route::get('author/add/{id}', 'AuthorController@addAuthor');
Route::post('author/store/', 'AuthorController@storeAuthor');
Route::get('author/delete/{id}', 'AuthorController@deleteAuthor');
Route::get('author/destroy/{id}', 'AuthorController@destroyAuthor');

Route::get('genre/add/{id}', 'GenreController@addGenre');
Route::post('genre/store/', 'GenreController@storeGenre');
Route::get('genre/delete/{id}', 'GenreController@deleteGenre');
Route::get('genre/destroy/{id}', 'GenreController@destroyGenre');
