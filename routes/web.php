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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@returnRegisterPage');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@returnLoginPage');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/dashboard', 'Admin\DashboardController@returnDashboardPage');

