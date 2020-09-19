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
    return view('auth/index');
});

Route::get('/login', 'Auth/LoginController@index')->name('login');
Route::get('/admin', 'AdminController@index');

// rt
Route::get('/admin/rt', 'AdminController@rt');
// add rt
Route::get('rt/tambah', 'RtController@tambah_rt');
// insert rt
Route::post('rt/simpan', 'RtController@simpan_rt');
// edit rt
Route::get('rt/edit/{id}', 'RtController@edit_rt');
// update rt
Route::post('rt/update', 'RtController@update_rt');
// delete rt
Route::get('rt/delete/{id}', 'RtController@delete_rt');

// warga
Route::get('/admin/warga', 'AdminController@warga');
// add warga
Route::get('warga/tambah', 'WargaController@tambah_warga');
// insert warga
Route::post('warga/simpan', 'WargaController@simpan_warga');
// edit warga
Route::get('warga/edit/{id}', 'WargaController@edit_warga');
// update warga
Route::post('warga/update', 'WargaController@update_warga');
// delete warga
Route::get('warga/delete/{id}', 'WargaController@delete_warga');




Route::get('/pemilihan', 'PemilihanController@index');
// get pemilih
Route::get('/pemilihan/data_pemilih', 'PemilihanController@data_pemilih');
// get pemilih per bilik suara
Route::get('/pemilihan/get_pemilih/{id}', 'PemilihanController@get_pemilih');
// tempatkan pemilih per bilik suara
Route::get('/pemilihan/tempatkan/{id}/{id_bilik}', 'PemilihanController@tempatkan_pemilih');
// get pemilih per bilik suara
Route::get('/pemilihan/hapus_pemilih/{id}', 'PemilihanController@hapus_pemilih');
// get notify pemilihan
Route::get('/pemilihan/notify', 'PemilihanController@notify');

Route::get('/pemilihan/send', function() {
    event(new App\Events\MyNotify('success','Siswoyo'));
    return "Event has been sent!";
});

// calon
Route::get('/admin/calon', 'AdminController@calon');
// add calon
Route::get('calon/tambah', 'CalonController@tambah_calon');
// insert calon
Route::post('calon/simpan', 'CalonController@simpan_calon');
// delete calon
Route::get('calon/delete/{id}', 'CalonController@delete_calon');
// data visimisi
Route::get('calon/visi_misi/{id}', 'CalonController@visi_misi');
// insert visi
Route::post('calon/simpan_misi', 'CalonController@simpan_misi');
// delete visi
Route::get('calon/delete_visi/{id_calon}/{id}', 'CalonController@delete_visi');
// insert misi
Route::post('calon/simpan_visi', 'CalonController@simpan_visi');
// delete misi
Route::get('calon/delete_misi/{id_calon}/{id}', 'CalonController@delete_misi');

// bilik suara
Route::get('/admin/bilik', 'AdminController@bilik_suara');
// add bilik suara
Route::get('bilik/tambah', 'BilikController@tambah_bilik');
// insert bilik suara
Route::post('bilik/simpan', 'BilikController@simpan_bilik');
// edit bilik suara
Route::get('bilik/edit/{id}', 'BilikController@edit_bilik');
// update bilik suara
Route::post('bilik/update', 'BilikController@update_bilik');
// delete bilik suara
Route::get('bilik/delete/{id}', 'BilikController@delete_bilik');


//data saksi 
Route::get('admin/saksi', 'AdminController@saksi');
// add saksi
Route::get('saksi/tambah', 'SaksiController@tambah_saksi');
// insert saksi
Route::post('saksi/simpan', 'SaksiController@simpan_saksi');
// delete saksi
Route::get('saksi/delete/{id}', 'SaksiController@delete_saksi');

// realtime vote
Route::get('vote/voting/{bilik}', 'VoteController@index');
// get realtime pemilih
Route::get('vote/get_pemilih/{bilik}', 'VoteController@get_pemilih');
// get calon
Route::get('vote/get_calon/', 'VoteController@get_calon');
// vote calon
Route::get('vote/vote_calon/{id_pemilih}/{id_calon}', 'VoteController@vote_calon');
// Realtime perhitungan 
Route::get('quick/quick_count', 'QuickCountController@quick_count');
// realtime perhitungan
Route::get("quick/realtime", 'QuickCountController@realtime_count');
// final result
Route::get("quick/final", 'QuickCountController@final_count');
// system
Route::get('system', 'SystemController@index');
// update system
Route::post('system/update', 'SystemController@update');
// menu reset system 
Route::get('system/reset', 'SystemController@reset');
// hapus seluruh data pemilih system
Route::get('system/truncate/{type}', 'SystemController@truncate_data');

// report
Route::get('report/', 'ReportController@index');
// report print
Route::get('report/print/{type}', 'ReportController@print');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');