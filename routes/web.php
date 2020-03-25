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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WebsiteController@index')->name("index");
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Route::get('/home/setting','WebsiteController@setting')->name("setting")->middleware('auth');
Route::get('/home/perijinan','PerijinanController@index')->name("perijinan")->middleware('auth');
Route::get('/home/product','ProducController@index')->name("Product")->middleware('auth');
Route::get('/home/dokumentasi','DokumentasiController@index')->name("dokumentasi")->middleware('auth');
Route::get('/home/mitra','MitraController@index')->name("dokumentasi")->middleware('auth');
Route::get('/home/mitra/create','MitraController@create')->name("dokumentasi")->middleware('auth');
