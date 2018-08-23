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

Route::get('/','HomeController@index');
Route::get('/profile','HomeController@profile');
Route::post('/profile','HomeController@update_profile');
Route::auth();

Route::get('/katalog', 'KatalogController@index');
Route::get('/barang/tambah','KatalogController@tambah');
Route::post('/barang/tambah','KatalogController@simpan_tambah');
Route::get('/barang/edit/{id}','KatalogController@update');
Route::post('/barang/edit/{id}','KatalogController@simpan_update');
Route::get('/barang/hapus/{id}','KatalogController@hapus');

/* ROUTING UNTUK PEMASUKAN */
Route::get('/barangmasuk','PersediaanController@databarangmasuk');
Route::get('/barangmasuk/input','PersediaanController@barangmasuk');
Route::post('/barangmasuk/input','PersediaanController@post_barangmasuk');
Route::get('/barangmasuk/update/{id}','PersediaanController@updatebarangmasuk');
Route::post('/barangmasuk/update/{id}','PersediaanController@postupdatebarangmasuk');
Route::get('/barangmasuk/hapus/{id}','PersediaanController@hapusbarangmasuk');

/* ROUTING UNTUK PENGELUARAN */
Route::get('/barangkeluar','PersediaanController@databarangkeluar');
Route::get('/barangkeluar/input','PersediaanController@barangkeluar');
Route::post('/barangkeluar/input','PersediaanController@post_barangkeluar');
Route::get('/barangkeluar/update/{id}','PersediaanController@updatebarangkeluar');
Route::post('/barangkeluar/update/{id}','PersediaanController@postupdatebarangkeluar');
Route::get('/barangkeluar/hapus/{id}','PersediaanController@hapusbarangkeluar');