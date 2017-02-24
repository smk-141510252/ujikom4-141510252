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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('Jabatan','JabatanController');
Route::resource('Golongan','GolonganController');
Route::resource('Kategori','KategoriController');
Route::resource('Pegawai','PegawaiController');
Route::resource('Lembur','LemburController');
Route::resource('Tunjangan','TunjanganController');
Route::resource('TunjanganP','TunjanganPController');
Route::resource('Penggajians','PenggajianController');

Route::group(['middleware' => ['api'],'prefix' => 'api'], function () {
    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');

    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'APIController@get_user_details');
    });
});