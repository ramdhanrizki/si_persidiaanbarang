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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/katalog', 'KatalogController@index');
Route::get('/barang/tambah','KatalogController@tambah');
Route::post('/barang/tambah','KatalogController@simpan_tambah');
Route::get('/barang/edit/{id}','KatalogController@update');
Route::post('/barang/edit/{id}','KatalogController@simpan_update');
Route::get('/barang/hapus/{id}','KatalogController@hapus');