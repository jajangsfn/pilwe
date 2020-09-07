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


// warga
Route::get('/admin/warga', 'AdminController@warga');
// add warga
Route::get('warga/tambah', 'WargaController@tambah_warga');
// insert warga
Route::post('warga/insert', 'WargaController@simpan_warga');
// edit warga
Route::get('warga/edit/{id}', 'WargaController@edit_warga');
// update warga
Route::post('warga/update', 'WargaController@update_warga');
// delete warga
Route::get('warga/delete/{id}', 'WargaController@delete_warga');

Route::get('/admin/pemilihan', 'AdminController@pemilihan');

Route::get('/admin/calon', 'AdminController@calon');

Route::get('/admin/bilik_suara', 'AdminController@bilik_suara');
