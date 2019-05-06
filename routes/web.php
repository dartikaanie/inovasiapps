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

//------------------------- ADMIN-----------------------------------------

Route::group(['middleware' => 'auth'], function () {
    Route::resource('kategoris', 'admin\kategoriController');
    Route::resource('subKategoris', 'admin\subKategoriController');
    Route::resource('kriterias', 'admin\kriteriaController');
    Route::resource('kriteraiaKategoriPenilaians', 'kriteraiaKategoriPenilaianController');
    Route::resource('listInovasis', 'admin\listInovasiController');
    Route::get('listInovasiTerimplementasi','admin\listInovasiController@implemen')->name('listInovasis.implemen');
    Route::get('timInovasi','admin\dashboardController@tim')->name('timInovasi');
    Route::get('listNilaiInovasis', 'admin\listInovasiController@nilai')->name('listNilaiInovasi');
    Route::get('showNilaiInovasis/{inovasi_id}', 'admin\listInovasiController@showNilai')->name('showNilaiInovasi');
    Route::resource('streams', 'admin\streamController');
    Route::get('streams/delete/{id}', 'admin\streamController@delete')->name('deleteStream');


    Route::get('addJuriStream/{stream_tid}','admin\streamController@addJuri')->name('addJuriStream');
    Route::post('addJuriStream/','admin\streamController@streamJuri')->name('streamJuri');
    Route::get('delJuriStream/{nip}/{stream_id}','admin\streamController@deleteStreamJuri')->name('delStreamJuri');

    Route::get('addInovasiStream/{stream_tid}','admin\streamController@addInovasi')->name('addInovasiStream');
    Route::post('addInovasiStream/','admin\streamController@streamInovasi')->name('streamInovasi');
    Route::get('delInovasiStream/{inovasi_id}/{stream_id}','admin\streamController@deleteStreamInovasi')->name('delStreamInovasi');
    Route::get('detailInovasiStream/{inovasi_id}/{stream_id}','admin\streamController@detailStreamInovasi')->name('detailStreamInovasi');


    Route::resource('juris', 'admin\juriController');
    Route::get('juris/statusJuri/{nip}','admin\juriController@ubahStatus')->name('statusJuri');
    Route::get('dashboard','admin\dashboardController@index')->name('dashboard');
    Route::get('dashboard/chart','admin\dashboardController@chart')->name('chartDashboard');
    Route::get('dashboard/chartDept/{tahun}','admin\dashboardController@chartDept')->name('chartDashboardDepartemen');
    Route::get('dashboard/chartJekel/{tahun}','admin\dashboardController@chartjekel')->name('charJekel');

    Route::get('laporan','admin\laporanController@bulan')->name('laporanBulan');
    Route::get('laporan/semua','admin\laporanController@semua')->name('laporanSemua');
    Route::get('laporan/tahun','admin\laporanController@tahun')->name('laporanTahun');
    Route::get('laporan/tigaBulan','admin\laporanController@tigaBulan')->name('laporan3Bulan');

    Route::get('exportInovasi',  'laporanController@bulanExportExcel')->name('exportInovasi');



//-------------------------peserta--------------------------------------------

Route::resource('tims', 'peserta\timController');

Route::patch('statusUpdate/{inovasi_id}', 'peserta\inovasiController@editStatus')->name('editStatus');

Route::resource('anggotaTims', 'peserta\anggotaTimController');

Route::get('/anggotaTimjum','peserta\anggotaTimController@directToForm')->name('directToForm');
Route::get('/anggotaTimAdd/{jum}/{inovasi}','peserta\inovasiController@addAnggota')->name('addAnggota');
Route::post('/anggotaTimStore','peserta\inovasiController@storeAnggota')->name('storeAnggota');

Route::resource('inovasis', 'peserta\inovasiController');

Route::resource('inovasiPesertas', 'peserta\inovasiPesertaController');

Route::get('tambahInovasi/{tim_tid}','peserta\inovasiController@create');

Route::get('dashboardPeserta','peserta\dashboardPesertaController@index')->name('dashboardPeserta');
   Route::post('kendalaButuh','kendalaController@kendalaButuh')->name('kendalaButuh');
    Route::post('areaAdd','peserta\inovasiController@areaAdd')->name('areaAdd');


    Route::get('/getDokumen/{path}/{nama}', function ($path, $nama) {
        return view('peserta.dashboard.dokumen', compact('path','nama'));
    });

//-------------------------------------JURI-----------------------------------------

    Route::resource('penilaianTims', 'juri\penilaianTimController');
    Route::resource('inovasiJuris', 'juri\inovasiJuriController');
    Route::get('showPenilaian/{id}', 'juri\inovasiJuriController@showPenilaian')->name('showPenilaian');
    Route::get('kunciNilai/{inovasi_id}', 'juri\penilaianTimController@kunciNilai')->name('kunciNilai');
    Route::get('showNilaiInovasiJuri/{inovasi_id}', 'juri\penilaianTimController@showNilai')->name('showNilaiInovasiJuri');


//---------------------------------------------------------------------------------


Route::resource('statusAnggotas', 'statusAnggotaController');



Route::resource('subKriterias', 'admin\subKriteriaController');

Route::get('/data/kriterias','kriteriaController@getData')->name('getDataKriteria');


Route::resource('kendalas', 'kendalaController');

});
