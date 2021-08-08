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

Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
    Route::get('/hello' ,'Hellocontroller@hello')->name('hello');
});

Route::group(['namespace' => 'Site', 'middleware' => 'guest'], function () {

});