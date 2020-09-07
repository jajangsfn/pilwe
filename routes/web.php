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



Route::get('/admin', 'AdminController@index');

Route::get('/admin/rt', 'AdminController@rt');

Route::get('/admin/warga', 'AdminController@warga');

Route::get('/admin/pemilihan', 'AdminController@pemilihan');

Route::get('/admin/calon', 'AdminController@calon');

Route::get('/admin/bilik_suara', 'AdminController@bilik_suara');
