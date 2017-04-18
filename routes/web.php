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

Route::get('/protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::get('/', 'MainController@index')->name('home');
Route::get('/list', 'MainController@showList');
Route::get('/register', 'MainController@register');
Route::get('/login', 'MainController@login');

Route::get('/members', 'PagesController@showMembers');
Route::get('/districts', 'PagesController@showDistricts');
Route::get('/comments', 'PagesController@showComments');
Route::post('/comments', 'PagesController@publishComment');

Route::post('/register', 'SessionController@registration');
Route::post('/login', 'SessionController@login');
Route::get('/logout', 'SessionController@logout');

Route::get('/profile/pwd_settings', 'UserController@showSensSettings');
Route::get('/profile/settings', 'UserController@showSettings');
Route::patch('/profile/pwd_settings', 'UserController@editSensUser');
Route::patch('/profile/settings', 'UserController@editUser');
Route::get('/profile/{id?}', 'UserController@showMember');

Route::get('/admin/editU-{id}', 'AdministrationController@editUser');
Route::post('/admin/district', 'AdministrationController@addDistrict');
Route::delete('/admin/deleteU-{id}', 'AdministrationController@deleteUser');
Route::delete('/admin/deleteD-{id}', 'AdministrationController@deleteDistrict');

Route::get('/term/new', 'TermController@addTerm');


