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

    Route::group(['middleware' => ['can:admin_kontraktor']], function () {
        Route::resource('jsa', 'JsaController')->except('edit','update','index','show');

        Route::get('/langkahPekerjaan/create/{jsa}', 'LangkahPekerjaanController@create')->name('langkahPekerjaan.create');
        Route::resource('langkahPekerjaan', 'LangkahPekerjaanController')->except('create','show','index');
    });

    Route::group(['middleware' => ['can:hse-manager_kontraktor']], function () {
        Route::get('/jsa/verifikasi/{jsa}', 'JsaController@edit')->name('jsa.verifikasi');
    });

    Route::group(['middleware' => ['can:hse']], function () {
        Route::get('/ijin-kerja-panas/create/{jsa}', 'IjinKerjaPanasController@create')->name('ijin-kerja-panas.create');
        Route::get('/ijin-kerja-panas/{id}/edit', 'IjinKerjaPanasController@edit')->name('ijin-kerja-panas.edit');

        Route::get('/ijin-kerja-di-ketinggian/create/{jsa}', 'IjinKerjaDiKetinggianController@create')->name('ijin-kerja-di-ketinggian.create');
        Route::get('/ijin-kerja-di-ketinggian/{id}/edit', 'IjinKerjaDiKetinggianController@edit')->name('ijin-kerja-di-ketinggian.edit');

        Route::get('/ijin-kerja-galian/create/{jsa}', 'IjinKerjaGalianController@create')->name('ijin-kerja-galian.create');
        Route::get('/ijin-kerja-galian/{id}/edit', 'IjinKerjaGalianController@edit')->name('ijin-kerja-galian.edit');

        Route::get('/ijin-kerja-listrik/create/{jsa}', 'IjinKerjaListrikController@create')->name('ijin-kerja-listrik.create');
        Route::get('/ijin-kerja-listrik/{id}/edit', 'IjinKerjaListrikController@edit')->name('ijin-kerja-listrik.edit');

        Route::get('/ijin-kerja-radiografi/create/{jsa}', 'IjinKerjaRadiografiController@create')->name('ijin-kerja-radiografi.create');
        Route::get('/ijin-kerja-radiografi/{id}/edit', 'IjinKerjaRadiografiController@edit')->name('ijin-kerja-radiografi.edit');

        Route::get('/ijin-kerja-ruang-terbatas/create/{jsa}', 'IjinKerjaRuangTerbatasController@create')->name('ijin-kerja-ruang-terbatas.create');
        Route::get('/ijin-kerja-ruang-terbatas/{id}/edit', 'IjinKerjaRuangTerbatasController@edit')->name('ijin-kerja-ruang-terbatas.edit');

        Route::resource('ijinKerjaPanas', 'IjinKerjaPanasController')->except('index','create','show','edit');
        Route::resource('ijinKerjaDiKetinggian', 'IjinKerjaDiKetinggianController')->except('index','create','show','edit');
        Route::resource('ijinKerjaGalian', 'IjinKerjaGalianController')->except('index','create','show','edit');
        Route::resource('ijinKerjaListrik', 'IjinKerjaListrikController')->except('index','create','show','edit');
        Route::resource('ijinKerjaRadiografi', 'IjinKerjaRadiografiController')->except('index','create','show','edit');
        Route::resource('ijinKerjaRuangTerbatas', 'IjinKerjaRuangTerbatasController')->except('index','create','show','edit');

        Route::resource('alatPelindungDiri', 'AlatPelindungDiriController')->except('index','create','show','edit');
        Route::resource('dokumenPendukung', 'DokumenPendukungController')->except('index','create','show','edit');
        Route::resource('jenisPekerjaan', 'JenisPekerjaanController')->except('index','create','show','edit');
        Route::resource('pengesahan', 'PengesahanController')->except('index','create','show','edit');
        Route::resource('petugasPengawas', 'PetugasPengawasController')->except('index','create','show','edit');
        Route::resource('sumberBahayaAlat', 'SumberBahayaAlatController')->except('index','create','show','edit');
        Route::resource('ujiKandunganGas', 'UjiKandunganGasController')->except('index','create','show','edit');
        Route::resource('umum', 'UmumController')->except('index','create','show','edit');
        Route::resource('validasi', 'ValidasiController')->except('index','create','show','edit');
    });

    Route::group(['middleware' => ['can:no_admin']], function () {
        Route::get('/jsa-grid', 'JsaController@index');
        Route::resource('jsa', 'JsaController')->except('create','store','destroy');

        Route::get('/ijin-kerja-grid', 'JsaController@ijinKerja')->name('ijin-kerja-grid');
        Route::get('/ijin-kerja', 'JsaController@ijinKerja')->name('ijin-kerja');

        Route::get('/ijin-kerja-panas/{id}', 'IjinKerjaPanasController@index')->name('ijin-kerja-panas.index');
        Route::get('/ijin-kerja-panas-grid/{id}', 'IjinKerjaPanasController@index')->name('ijin-kerja-panas-grid.index');
        Route::get('/ijin-kerja-panas/{id}/cetak/', 'IjinKerjaPanasController@cetak')->name('ijin-kerja-panas.cetak');
        Route::get('/ijin-kerja-panas/{id}/show/', 'IjinKerjaPanasController@show')->name('ijin-kerja-panas.show');

        Route::get('/ijin-kerja-galian/{id}', 'IjinKerjaGalianController@index')->name('ijin-kerja-galian.index');
        Route::get('/ijin-kerja-galian-grid/{id}', 'IjinKerjaGalianController@index')->name('ijin-kerja-galian-grid.index');
        Route::get('/ijin-kerja-galian/{id}/cetak/', 'IjinKerjaGalianController@cetak')->name('ijin-kerja-galian.cetak');
        Route::get('/ijin-kerja-galian/{id}/show/', 'IjinKerjaGalianController@show')->name('ijin-kerja-galian.show');

        Route::get('/ijin-kerja-listrik/{id}', 'IjinKerjaListrikController@index')->name('ijin-kerja-listrik.index');
        Route::get('/ijin-kerja-listrik-grid/{id}', 'IjinKerjaListrikController@index')->name('ijin-kerja-listrik-grid.index');
        Route::get('/ijin-kerja-listrik/{id}/cetak/', 'IjinKerjaListrikController@cetak')->name('ijin-kerja-listrik.cetak');
        Route::get('/ijin-kerja-listrik/{id}/show/', 'IjinKerjaListrikController@show')->name('ijin-kerja-listrik.show');

        Route::get('/ijin-kerja-radiografi/{id}', 'IjinKerjaRadiografiController@index')->name('ijin-kerja-radiografi.index');
        Route::get('/ijin-kerja-radiografi-grid/{id}', 'IjinKerjaRadiografiController@index')->name('ijin-kerja-radiografi-grid.index');
        Route::get('/ijin-kerja-radiografi/{id}/cetak/', 'IjinKerjaRadiografiController@cetak')->name('ijin-kerja-radiografi.cetak');
        Route::get('/ijin-kerja-radiografi/{id}/show/', 'IjinKerjaRadiografiController@show')->name('ijin-kerja-radiografi.show');

        Route::get('/ijin-kerja-di-ketinggian/{id}', 'IjinKerjaDiKetinggianController@index')->name('ijin-kerja-di-ketinggian.index');
        Route::get('/ijin-kerja-di-ketinggian-grid/{id}', 'IjinKerjaDiKetinggianController@index')->name('ijin-kerja-di-ketinggian-grid.index');
        Route::get('/ijin-kerja-di-ketinggian/{id}/cetak/', 'IjinKerjaDiKetinggianController@cetak')->name('ijin-kerja-di-ketinggian.cetak');
        Route::get('/ijin-kerja-di-ketinggian/{id}/show/', 'IjinKerjaDiKetinggianController@show')->name('ijin-kerja-di-ketinggian.show');

        Route::get('/ijin-kerja-ruang-terbatas/{id}', 'IjinKerjaRuangTerbatasController@index')->name('ijin-kerja-ruang-terbatas.index');
        Route::get('/ijin-kerja-ruang-terbatas-grid/{id}', 'IjinKerjaRuangTerbatasController@index')->name('ijin-kerja-ruang-terbatas-grid.index');
        Route::get('/ijin-kerja-ruang-terbatas/{id}/cetak/', 'IjinKerjaRuangTerbatasController@cetak')->name('ijin-kerja-ruang-terbatas.cetak');
        Route::get('/ijin-kerja-ruang-terbatas/{id}/show/', 'IjinKerjaRuangTerbatasController@show')->name('ijin-kerja-ruang-terbatas.show');

        Route::resource('langkahPekerjaan', 'LangkahPekerjaanController')->except('create','update','destroy','edit','index');
    });

});
