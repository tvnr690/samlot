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
    return view('welcome');
});

Route::get('/pdf','PdfController@index');

Route::get('/upload', 'UploadController@index')->name('upload');
Route::get('/create', 'UploadController@create')->name('create');
Route::post('/store', 'UploadController@store')->name('store');
Route::get('{upload}/show', 'UploadController@show')->name('show');
Route::delete('{upload}', 'UploadController@destroy')->name('delete');



