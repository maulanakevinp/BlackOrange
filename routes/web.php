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
    return view('beranda');
});

Route::get('/produk', 'ProductController@index')->name('produk.index');
Route::get('/jasa', 'ProductController@indexJasa')->name('jasa.index');

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', 'AuthController@index')->name('masuk');
    Route::post('/masuk', 'AuthController@masuk')->name('masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/pengaturan-website', 'UtilityController@index');
    Route::get('/ganti-password', 'AuthController@edit');
    Route::post('/keluar', 'AuthController@keluar')->name('keluar');
    Route::resource('produk', 'ProductController')->except('index');
    Route::resource('brand', 'BrandController');
    Route::resource('slideshow', 'SlideShowController');
    Route::resource('testimoni', 'TestimonialController');
});
