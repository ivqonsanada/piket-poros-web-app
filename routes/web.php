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
    return view('index');
});
$this->get('/login', 'User\LoginController@showLoginForm')->name('login');

Route::name('user.')->group(function () {
    Route::prefix('dashboard')->group(function () {
        $this->get('/', 'User\UserController@index')->name('dashboard');
        Route::get('/kuliah', 'User\UserController@jadwalKuliah')->name('kuliah');
        Route::get('/daftar', 'User\UserController@daftarPiket')->name('daftar');
        Route::post('/daftar', 'User\UserController@simpanPiket')->name('simpanPendaftaran');
        Route::post('/agenda', 'User\UserController@tambahAgenda')->name('tambahAgenda');
        Route::get('/agenda/hapus/{id}', 'User\UserController@hapusAgenda')->name('hapusAgenda');
    });

    Route::post('/login', 'User\LoginController@getSIAM')->name('postLogin');
    Route::get('/logout', 'User\LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
