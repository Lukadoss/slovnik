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

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('home');
Route::get('/list', 'MainController@showList');
Route::get('/register', 'MainController@register');

Route::get('/comments', 'CommentsController@showAll');

Route::post('/register', 'UserController@registration');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::get('/profile', 'UserController@profile');