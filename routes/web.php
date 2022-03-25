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

Route::get('/',function(){
    return view('dashboard');
});
    
Route::get('/login', function(){
    return view('auth.login');
});
Route::get('/unitKerja', 'DataMasterController@unitKerja');
Route::get('/pegawai', 'DataMasterController@pegawai');
Route::get('/pegawai/search', 'DataMasterController@searchPegawai')->name('search.pegawai');
Route::get('/golongan', 'DataMasterController@golongan');
Route::get('/jabatan', 'DataMasterController@jabatan');
Route::get('/pendidikan', 'DataMasterController@pendidikan');

Route::get('/penilaian', 'PenilaianController@index');
Route::post('/penilaian/data', 'PenilaianController@data')->name('penilaian.data');
Route::put('/penilaian', 'PenilaianController@storeUpdate')->name('penilaian.update');
Route::delete('/penilaian', 'PenilaianController@delete')->name('penilaian.delete');
Route::get('/penilaian/cetak/{idpenilaian}', 'PenilaianController@cetak')->name('penilaian.cetak');