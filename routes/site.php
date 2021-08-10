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
    Route::get('/profile' ,'profileController@profile')->name('profile');
    Route::post('/update_profile' ,'profileController@update_profile')->name('update_profile');

    
    Route::get('/transfer' ,'profileController@transfer')->name('transfer');
    Route::post('/transfer_money' ,'profileController@transfer_money')->name('transfer_money');
    Route::get('/my_transactions' ,'profileController@my_transactions')->name('my_transactions');

    
});

Route::group(['namespace' => 'Site', 'middleware' => 'guest'], function () {

});