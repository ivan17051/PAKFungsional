<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitKerja;
use App\Golongan;
use App\Pegawai;
use App\Jabatan;
use App\Pendidikan;

class DataMasterController extends Controller
{
    public function unitKerja(){
        $unitKerja = UnitKerja::all();
        return view('masterData.unitKerja', ['unitKerja'=>$unitKerja]);
    }
    public function pegawai(){
        $pegawai = Pegawai::all();
        return view('masterData.pegawai', ['pegawai'=>$pegawai]);
    }
    public function golongan(){
        $golongan = Golongan::all();
        return view('masterData.golongan', ['golongan'=>$golongan]);
    }
    public function jabatan(){
        $jabatan = Jabatan::all();
        return view('masterData.jabatan', ['jabatan'=>$jabatan]);
    }
    public function pendidikan(){
        $pendidikan = Pendidikan::all();
        return view('masterData.pendidikan', ['pendidikan'=>$pendidikan]);
    }
}
