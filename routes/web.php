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
Route::get('/register', 'MainController@register');
Route::get('/login', 'MainController@login');
Route::get('/term/{id}', 'MainController@termDetail');
Route::get('/list/{sign}', 'MainController@showTerms');
Route::get('/list', 'MainController@showTerms');
Route::get('/search', 'MainController@searchTerms');

Route::get('/members', 'PageController@showMembers');
Route::get('/districts', 'PageController@showDistricts');
Route::get('/comments', 'PageController@showComments');
Route::post('/comments', 'PageController@publishComment');
Route::get('/term', 'PageController@showNewTerm');

Route::post('/register', 'SessionController@registration');
Route::post('/login', 'SessionController@login');
Route::get('/logout', 'SessionController@logout');

Route::get('/profile/pwd_settings', 'UserController@showSensSettings');
Route::get('/profile/settings', 'UserController@showSettings');
Route::patch('/profile/pwd_settings', 'UserController@editSensUser');
Route::patch('/profile/settings', 'UserController@editUser');
Route::get('/profile/{id?}', 'UserController@showMember');

Route::get('/admin/authU-{id}', 'AdministrationController@authUser');
Route::get('/admin/editU-{id}', 'AdministrationController@editUser');
Route::get('/admin/editUD-{id}', 'AdministrationController@showUserDistrict');
Route::post('/admin/editUD-{id}', 'AdministrationController@addUserDistrict');
Route::delete('/admin/deleteU-{id}', 'AdministrationController@deleteUser');
Route::delete('/admin/deleteD-{id}', 'AdministrationController@deleteDistrict');

Route::post('/user/district', 'DistrictController@addDistrict');

Route::post('/term/new', 'TermController@addTerm');
Route::get('/term/waiting', 'TermController@checkTerms');

Route::get('/term/accept/{id}', 'TermController@acceptTerm');
Route::get('/term/edit/{id}', 'TermController@showEdit');
Route::patch('/term/edit/{id}', 'TermController@editTerm');
Route::delete('/term/delete/{id}', 'TermController@deleteTerm');

