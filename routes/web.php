<?php

use Illuminate\Http\Request;
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

Route::post('/', function (Request $request) {
    $data= $request->day_of_week;
    foreach ($data as $key => $value) {
        $obj = new stdClass();
        $obj->day_of_week = $key;
        $obj->result_level = $value;
        dd($obj);
    }
});
Route::get('register','AuthController@showFormRegister')->name('auth.showFormRegister');
Route::get('login','AuthController@showFormLogin')->name('login');
Route::post('login','AuthController@login')->name('auth.login');
Route::post('register','AuthController@register')->name('auth.register')->middleware('checkAge');
Route::middleware(['auth','setLocale'])->prefix('admin')->group(function (){

    Route::get('logout','AuthController@logout')->name('auth.logout');

    Route::get('/dashboard', 'AdminController@showDashboard');
    Route::prefix('/users')->group(function (){
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/{id}/edit', 'UserController@showFormEdit')->name('users.showFormEdit');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::post('/{id}/edit', 'UserController@update')->name('users.update');
        Route::get('/{id}/delete', 'UserController@delete')->name('users.delete');
    });

    Route::post('language','LangController@setLocale')->name('lang.setLocale');

    Route::prefix('github')->group(function (){
        Route::prefix('users')->group(function (){
            Route::get('/','Api\GithubController@index');
            Route::get('/search','Api\GithubController@search')->name('github.users.search');
            Route::get('/{name}','Api\GithubController@getUser')->name('github.users.detail');
        });
    });
});
