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

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $districts = DB::table('district')->get();

    return view('pages.index', compact('districts'));
});

Route::get('tmpl1', function (){
   return view('templates.android');
});

Route::get('tmpl2', function (){
    return view('templates.graphs');
});

Route::get('tmpl3', function (){
    return view('templates.blog');
});

Route::get('rejstrik', function (){
    return view('pages.catalog');
});