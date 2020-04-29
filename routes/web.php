<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
	Route::get('/', 'AuthController@login')->name('signin');
    Route::post('prosesLogin', 'AuthController@prosesLogin')->name('prosesLogin');
    Route::get('/daftar', function () { return view('register'); });
});

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth','checkRole:eksekutif,admin,admin_gresik,admin_surabaya']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth','checkRole:admin,admin_gresik']], function(){

    //Menu Gresik
    Route::get('/menugsk', 'MenugskController@index');
    Route::post('/menugsk/store', 'MenugskController@store');
    Route::get('/menugsk/hapus/{id}', 'MenugskController@delete');
    Route::get('/menugsk/menueditgsk/{id}','MenugskController@edit');
    Route::post('/menugsk/update','MenugskController@update');

    //Laporan Menu Gresik
    Route::get('/lapormenugsk', 'LapormenugskController@index');
    Route::get('/lapormenugsk/add', 'LapormenugskController@add');
    Route::post('/lapormenugsk/store', 'LapormenugskController@store');
    Route::get('/lapormenugsk/hapus/{id}', 'LapormenugskController@delete');

    //Karyawan Gresik
    Route::get('/karyawangsk', 'KaryawangskController@index');
    Route::post('/karyawangsk/store', 'KaryawangskController@store');
    Route::get('/karyawangsk/hapus/{id}', 'KaryawangskController@delete');
    Route::get('/karyawangsk/karyawaneditgsk/{id}','KaryawangskController@edit');
    Route::post('/karyawangsk/update','KaryawangskController@update');

    //Laporan Karyawan Gresik
    Route::get('/laporkaryawangsk', 'LaporkaryawangskController@index');
    Route::post('/laporkaryawangsk/store', 'LaporkaryawangskController@store');
    Route::get('/laporkaryawangsk/hapus/{id}', 'LaporkaryawangskController@delete');

    //Laporan Pengunjung Gresik
    Route::get('/laporpengunjunggsk', 'LaporpengunjunggskController@index');
    Route::post('/laporpengunjunggsk/store', 'LaporpengunjunggskController@store');
    Route::get('/laporpengunjunggsk/hapus/{id}', 'LaporpengunjunggskController@delete');
    Route::get('/laporpengunjunggsk/laporpengunjungeditgsk/{id}','LaporpengunjunggskController@edit');
    Route::post('/laporpengunjunggsk/update','LaporpengunjunggskController@update');
});

Route::group(['middleware' => ['auth','checkRole:admin,admin_surabaya']], function(){

    //Menu Surabaya
    Route::get('/menusby', 'MenusbyController@index');
    Route::post('/menusby/store', 'MenusbyController@store');
    Route::get('/menusby/hapus/{id}', 'MenusbyController@delete');
    Route::get('/menusby/menueditsby/{id}','MenusbyController@edit');
    Route::post('/menusby/update','MenusbyController@update');

    //Karyawan Surabaya
    Route::get('/karyawansby', 'KaryawansbyController@index');
    Route::post('/karyawansby/store', 'KaryawansbyController@store');
    Route::get('/karyawansby/hapus/{id}', 'KaryawansbyController@delete');
    Route::get('/karyawansby/karyawaneditsby/{id}','KaryawansbyController@edit');
    Route::post('/karyawansby/update','KaryawansbyController@update');

    //Laporan Menu Surabaya
    Route::get('/lapormenusby', 'LapormenusbyController@index');
    Route::get('/lapormenusby/add', 'LapormenusbyController@add');
    Route::post('/lapormenusby/store', 'LapormenusbyController@store');
    Route::get('/lapormenusby/hapus/{id}', 'LapormenusbyController@delete');

    //Laporan Karyawan Surabaya
    Route::get('/laporkaryawansby', 'LaporkaryawansbyController@index');
    Route::post('/laporkaryawansby/store', 'LaporkaryawansbyController@store');
    Route::get('/laporkaryawansby/hapus/{id}', 'LaporkaryawansbyController@delete');

    //Laporan Pengunjung Surabaya
    Route::get('/laporpengunjungsby', 'LaporpengunjungsbyController@index');
    Route::post('/laporpengunjungsby/store', 'LaporpengunjungsbyController@store');
    Route::get('/laporpengunjungsby/hapus/{id}', 'LaporpengunjungsbyController@delete');
    Route::get('/laporpengunjungsby/laporpengunjungeditsby/{id}','LaporpengunjungsbyController@edit');
    Route::post('/laporpengunjungsby/update','LaporpengunjungsbyController@update');
});

Route::group(['middleware' => ['auth','checkRole:eksekutif']], function(){

    Route::get('/grafikpengunjungsby', 'GrafikPengunjungController@index');
    Route::get('grafik/sumPengunjungSby', 'GrafikPengunjungController@sumPengunjungSby')->name('report.sumPengunjungSby');

    Route::get('/grafikpengunjunggsk', 'GrafikPengunjungController@indexGsk');
    Route::get('grafik/sumPengunjungGsk', 'GrafikPengunjungController@sumPengunjungGsk')->name('report.sumPengunjungGsk');

    Route::get('/grafikkaryawansby', 'GrafikKaryawanController@index');
    Route::get('grafik/sumKaryawanSby', 'GrafikKaryawanController@sumKaryawanSby')->name('report.sumKaryawanSby');
    Route::get('grafik/sumKaryawanMasukSby', 'GrafikKaryawanController@sumKaryawanMasukSby')->name('report.sumKaryawanMasukSby');
    Route::get('grafik/sumKaryawanAbsenSby', 'GrafikKaryawanController@sumKaryawanAbsenSby')->name('report.sumKaryawanAbsenSby');

    Route::get('/grafikkaryawangsk', 'GrafikKaryawanController@indexGsk');
    Route::get('grafik/sumKaryawanGsk', 'GrafikKaryawanController@sumKaryawanGsk')->name('report.sumKaryawanGsk');
    Route::get('grafik/sumKaryawanMasukGsk', 'GrafikKaryawanController@sumKaryawanMasukGsk')->name('report.sumKaryawanMasukGsk');
    Route::get('grafik/sumKaryawanAbsenGsk', 'GrafikKaryawanController@sumKaryawanAbsenGsk')->name('report.sumKaryawanAbsenGsk');

    Route::get('/grafikpenjualansby', 'GrafikPenjualanController@index');
    Route::get('grafik/sumPenjualanMakananSby1', 'GrafikPenjualanController@sumPenjualanMakananSby1')->name('report.sumPenjualanMakananSby1');
    Route::get('grafik/sumPenjualanMinumanSby1', 'GrafikPenjualanController@sumPenjualanMinumanSby1')->name('report.sumPenjualanMinumanSby1');
    Route::get('grafik/sumPenjualanMakananSby', 'GrafikPenjualanController@sumPenjualanMakananSby')->name('report.sumPenjualanMakananSby');
    Route::get('grafik/sumPenjualanMinumanSby', 'GrafikPenjualanController@sumPenjualanMinumanSby')->name('report.sumPenjualanMinumanSby');

    Route::get('/grafikpenjualangsk', 'GrafikPenjualanController@indexGsk');
    Route::get('grafik/sumPenjualanMakananGsk1', 'GrafikPenjualanController@sumPenjualanMakananGsk1')->name('report.sumPenjualanMakananGsk1');
    Route::get('grafik/sumPenjualanMinumanGsk1', 'GrafikPenjualanController@sumPenjualanMinumanGsk1')->name('report.sumPenjualanMinumanGsk1');
    Route::get('grafik/sumPenjualanMakananGsk', 'GrafikPenjualanController@sumPenjualanMakananGsk')->name('report.sumPenjualanMakananGsk');
    Route::get('grafik/sumPenjualanMinumanGsk', 'GrafikPenjualanController@sumPenjualanMinumanGsk')->name('report.sumPenjualanMinumanGsk');

});