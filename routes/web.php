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

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/',function(){
        return view('dashboard');
    });
    Route::put('/ubah-password', 'PasswordController@update');

    Route::get('/unitKerja', 'DataMasterController@unitKerja');
    
    Route::get('/pegawai', 'DataMasterController@pegawai');
    Route::post('/pegawai/data', 'DataMasterController@pegawaiData')->name('pegawai.data');
    Route::get('/pegawai/search', 'DataMasterController@searchPegawai')->name('search.pegawai');
    Route::put('/pegawai', 'DataMasterController@storeUpdatePegawai')->name('pegawai.update');
    
    Route::get('/golongan', 'DataMasterController@golongan');
    Route::put('/golongan', 'DataMasterController@storeUpdateGolongan')->name('golongan.update');
    
    Route::get('/jabatan', 'DataMasterController@jabatan');
    Route::put('/jabatan', 'DataMasterController@storeUpdateJabatan')->name('jabatan.update');
    
    Route::get('/pendidikan', 'DataMasterController@pendidikan');
    Route::put('/pendidikan', 'DataMasterController@storeUpdatePendidikan')->name('pendidikan.update');
    
    Route::get('/penilaian', 'PenilaianController@index');
    Route::post('/penilaian/data', 'PenilaianController@data')->name('penilaian.data');
    Route::put('/penilaian', 'PenilaianController@storeUpdate')->name('penilaian.update');
    Route::delete('/penilaian', 'PenilaianController@delete')->name('penilaian.delete');
    Route::get('/penilaian/cetak/{idpenilaian}', 'PenilaianController@cetak')->name('penilaian.cetak'); 
});