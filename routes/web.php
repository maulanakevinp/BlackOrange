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

Route::get('/', 'HomeController@index');
Route::get('/tentang-kami', 'HomeController@tentangKami');
Route::get('/gallery', 'GalleryController@index');
Route::get('/produk', 'ProductController@index')->name('produk.index');
Route::get('/produk/{produk}/{slug}', 'ProductController@show')->name('produk.show');
Route::get('/jasa', 'JasaController@index')->name('jasa.index');
Route::get('/jasa/{produk}/{slug}', 'JasaController@show')->name('jasa.show');
Route::get('/image/{id}', 'ImageController@show')->name('image.show');

Route::get('/load-gallery', 'GalleryController@show')->name('gallery.show');

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', 'AuthController@index')->name('masuk');
    Route::post('/masuk', 'AuthController@masuk')->name('masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/pengaturan-website', 'UtilityController@index');
    Route::get('/ganti-password', 'AuthController@edit');
    Route::get('/tambah-produk', 'ProductController@create')->name('jasa.create');
    Route::get('/edit-produk/{produk}', 'ProductController@edit')->name('produk.edit');
    Route::get('/tambah-jasa', 'JasaController@create')->name('jasa.create');
    Route::get('/edit-jasa/{produk}', 'JasaController@edit')->name('jasa.edit');
    Route::get('/kelola-gallery', 'GalleryController@edit')->name('gallery.edit');
    Route::get('/slideshow', 'SlideShowController@index')->name('slideshow.index');
    Route::get('/load-slideshow', 'SlideShowController@show')->name('slideshow.show');
    Route::get('/brand', 'BrandController@index')->name('brand.index');
    Route::get('/load-brand', 'BrandController@show')->name('brand.show');
    Route::get('/testimoni', 'TestimonialController@index')->name('testimonial.index');
    Route::get('/load-testimonial', 'TestimonialController@show')->name('testimonial.show');

    Route::post('/keluar', 'AuthController@keluar')->name('keluar');
    Route::post('/image', 'ImageController@store')->name('image.store');
    Route::post('/gallery', 'GalleryController@store')->name('gallery.store');
    Route::post('/slideshow', 'SlideShowController@store')->name('slideshow.store');
    Route::post('/brand', 'BrandController@store')->name('brand.store');
    Route::post('/testimonial', 'TestimonialController@store')->name('testimonial.store');

    Route::patch('/ganti-password', 'AuthController@update')->name('ganti-password');
    Route::patch('/pengaturan-website', 'UtilityController@update')->name('utility.update');

    Route::delete('/gallery/{gallery}', 'GalleryController@destroy')->name('gallery.destroy');
    Route::delete('/delete-galleries', 'GalleryController@destroys')->name('gallery.destroys');
    Route::delete('/image/{image}', 'ImageController@destroy')->name('image.destroy');
    Route::delete('/delete-images', 'ImageController@destroys')->name('image.destroys');
    Route::delete('/slideshow/{slideshow}', 'SlideShowController@destroy')->name('slideshow.destroy');
    Route::delete('/delete-slideshows', 'SlideShowController@destroys')->name('slideshow.destroys');
    Route::delete('/brand/{brand}', 'BrandController@destroy')->name('brand.destroy');
    Route::delete('/delete-brands', 'BrandController@destroys')->name('brand.destroys');
    Route::delete('/testimonial/{testimonial}', 'TestimonialController@destroy')->name('testimonial.destroy');
    Route::delete('/delete-testimonials', 'TestimonialController@destroys')->name('testimonial.destroys');

    Route::resource('produk', 'ProductController')->except('index','create','show','edit');
    Route::resource('jasa', 'JasaController')->except('index','create','show','edit');
});
