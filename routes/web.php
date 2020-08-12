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

Route::get('register','AuthController@showFormRegister')->name('auth.showFormRegister');
Route::get('login','AuthController@showFormLogin')->name('auth.showFormLogin');
Route::post('login','AuthController@login')->name('auth.login');
Route::post('register','AuthController@register')->name('auth.register')->middleware('checkAge');
Route::middleware('checkLogin')->prefix('admin')->group(function (){

    Route::get('logout','AuthController@logout')->name('auth.logout');


    Route::get('/dashboard', 'AdminController@showDashboard');
    Route::prefix('/users')->group(function (){
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/{id}/edit', 'UserController@showFormEdit')->name('users.showFormEdit');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::post('/{id}/edit', 'UserController@update')->name('users.update');

    });
});
