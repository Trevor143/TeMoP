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

//Route::get('/', function () {
//    return view('vendor.backpack.add_partner');
//});
Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('set-password', function (){
    return view('auth.passwords.setPassword');
})->name('setpass');

Route::post('password', 'TestController@password')->name('password');
