<?php

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// if not auth for login and register routes
Route::group(['namespace' => 'Dashboard','prefix' => 'admin'], function () {
    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
});

  // namespace indecate to controllers
  // middlewer to check if logined user is auth or not from guard admin installed in config auth
Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin','prefix' => 'admin'], function () {
   
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');  // the first page admin visits if authenticated

    Route::get('test', function(){
        return 'loggin';
    });

});