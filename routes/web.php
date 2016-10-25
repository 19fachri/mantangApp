<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Blade::setContentTags('<%', '%>');

Route::get('/', 'BeritaController@index');

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/admin/berita', 'AdminBeritaController');
Route::get('/berita','BeritaController@index');
Route::get('/berita/{judul}', 'BeritaController@detail');

Route::resource('/admin/kegiatan', 'AdminKegiatanController');
Route::get('/kegiatan', 'KegiatanController@index');
Route::get('/kegiatan/{judul}', 'KegiatanController@detail');

Route::resource('suararakyat', 'SuaraRakyatController');