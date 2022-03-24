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
Route::get('/report',function(){
    return view('report.pak');
});
    
Route::get('/login', function(){
    return view('auth.login');
});
Route::get('/unitKerja', 'DataMasterController@unitKerja');
Route::get('/pegawai', 'DataMasterController@pegawai');
Route::get('/golongan', 'DataMasterController@golongan');
Route::get('/jabatan', 'DataMasterController@jabatan');
Route::get('/pendidikan', 'DataMasterController@pendidikan');
