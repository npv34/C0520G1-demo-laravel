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
Route::post('register','AuthController@register')->name('auth.register')->middleware('checkAge');
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@showDashboard');
    Route::prefix('/users')->group(function (){
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/{id}/edit', 'UserController@showFormEdit')->name('users.showFormEdit');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
    });
});
