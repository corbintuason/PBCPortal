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


// Auth::routes();

Route::get('/login', 'Auth\DonorLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\DonorLoginController@login');
Route::post('logout', 'Auth\DonorLoginController@logout')->name('logout');


// Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

});

Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
// Route::get('/bloodInventory', 'AdminController@index')->name('admin.dashboard');

Route::get('{path}', 'AdminController@index')->where( 'path', '([A-z\d-\/_.]+)?' );


