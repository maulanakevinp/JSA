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

Route::group(['middleware' => ['web', 'guest']], function () {

    Route::get('/', function () {
        return redirect('/masuk');
    });
    Route::get('/masuk', 'AuthController@index')->name('masuk');
    Route::post('/masuk', 'AuthController@masuk');

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::post('/keluar', 'AuthController@keluar')->name('keluar');
    Route::get('/pengaturan', 'UserController@pengaturan')->name('pengaturan');
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::patch('/update-pengaturan/{user}', 'UserController@updatePengaturan')->name('update-pengaturan');
    Route::patch('/update-profil/{user}', 'UserController@updateProfil')->name('update-profil');

    Route::group(['middleware' => ['can:super_admin']], function () {
        Route::resource('pengguna', 'UserController');
    });

    Route::group(['middleware' => ['can:sub_kontraktor']], function () {
        Route::get('/jsa-grid', 'JsaController@index');
        Route::resource('jsa', 'JsaController');
    });

});
