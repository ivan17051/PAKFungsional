<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitKerja;

class DataMasterController extends Controller
{
    public function unitKerja(){
        $unitKerja = UnitKerja::all();
        return view('masterData.unitKerja', ['unitKerja'=>$unitKerja]);
    }
    public function pegawai(){
        return view('masterData.pegawai');
    }
    public function golongan(){
        return view('masterData.golongan');
    }
    public function jabatan(){
        return view('masterData.jabatan');
    }
    public function pendidikan(){
        return view('masterData.pendidikan');
    }
}
