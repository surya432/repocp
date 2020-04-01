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
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/home')->group(function () {
        Route::resource('perijinan', 'PerijinanController');
        Route::resource('mitra', 'MitraController');
        Route::resource('product', 'ProductController');
        Route::resource('dokumentasi', 'DokumentasiController');
        Route::resource('setting', 'GeneralController');
        Route::resource('about', 'AboutController');
    });
});

//Route::get('/home/setting','WebsiteController@setting')->name("setting")->middleware('auth');
// Route::get('/home/perijinan','PerijinanController@index')->name("perijinan")->middleware('auth');
// Route::POST('/home/perijinan/create','PerijinanController@Create')->name("perijinanCreate")->middleware('auth');
// Route::POST('/home/perijinan/edit','PerijinanController@Edit')->name("perijinanEdit")->middleware('auth');
//Route::get('/home/product','ProductController@index')->name("Product")->middleware('auth');
//Route::get('/home/product/create','ProductController@create')->name("ProductCreate")->middleware('auth');
//Route::get('/home/product/edit','ProductController@edit')->name("ProductEdit")->middleware('auth');
//Route::get('/home/dokumentasi','DokumentasiController@index')->name("dokumentasi")->middleware('auth');
//Route::get('/home/dokumentasi/create','DokumentasiController@create')->name("dokumentasiCreate")->middleware('auth');
//Route::get('/home/dokumentasi/edit','DokumentasiController@edit')->name("dokumentasiEdit")->middleware('auth');
// Route::get('/home/mitra','MitraController@index')->name("mitra")->middleware('auth');
// Route::get('/home/mitra/create','MitraController@create')->name("mitraCreate")->middleware('auth');
// Route::get('/home/mitra/edit','MitraController@edit')->name("mitraEdit")->middleware('auth');
