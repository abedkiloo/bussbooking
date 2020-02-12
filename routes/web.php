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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/{path}', 'HomeController@index')->name('path','([A-z\d-\/_.]+)?');

Route::get('{any}', 'HomeController@index')->name('path','([A-z\d-\/_.]+)?')->where('any','.*');;
