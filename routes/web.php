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


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('roles', 'roleController');

Route::resource('kategoris', 'kategoriController');

Route::resource('subKategoris', 'subKategoriController');

Route::resource('kriterias', 'kriteriaController');

Route::resource('kriterias', 'kriteriaController');

Route::resource('kriteraiaKategoriPenilaians', 'kriteraiaKategoriPenilaianController');

Route::resource('tims', 'timController');

Route::resource('anggitaTims', 'anggotaTimController');

Route::resource('statusAnggotas', 'statusAnggotaController');

Route::resource('inovasis', 'inovasiController');

Route::resource('streams', 'streamController');

Route::resource('penilaianTims', 'penilaianTimController');

Route::resource('subKriterias', 'subKriteriaController');