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

Route::get('/', function () {
    return view('public_page.welcome');
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');
