<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
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
        $unitKerja = UnitKerja::where('nama', 'LIKE', 'Puskesmas%')->select('id', 'nama')->get();
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        
        return view('masterData.pegawai', ['pegawai'=>$pegawai, 'unitKerja'=>$unitKerja, 'golongan'=>$golongan, 'jabatan'=>$jabatan]);
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

    public function searchPegawai(Request $request){
        $data=$request->input('query');
        // if($request->input('query')){
        $data = Pegawai::where('nama', 'like', '%' . strtolower($request->input('query')) . '%')
            ->orWhere('nip', 'like', '%' . strtolower($request->input('query')) . '%')
            ->limit(5)
            ->get();
        // }
        return response()->json($data);
    }
    public function storeUpdatePegawai(Request $request){
        $userId = Auth::id();
        
        $input = array_map('trim', $request->all());
        $validator = Validator::make($input, [
            'id' => 'nullable|exists:mpegawai,id',
            'nik' => 'string',
            'nip' => 'required|string',
            'nama' => 'required|string',
            'nokartu' => 'required|string',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required|string',
            'jeniskelamin' => 'required|string',
            'alamat' => 'string',
            'nohp' => 'string',
        ]);
        
        if ($validator->fails()) return back()->with('error','Gagal Menyimpan');
        try {
            $input = $validator->valid();
            if(isset($input['id'])){
                $model = Pegawai::firstOrNew([
                    'id' => $input['id']
                ]);
            }else{
                $model = new Pegawai();
            }
            $model->fill($input);    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
        $model->save();
        return back()->with('success','Berhasil Menyimpan');
    }
    public function storeUpdateGolongan(Request $request){
        $userId = Auth::id();
        
        $input = array_map('trim', $request->all());
        $validator = Validator::make($input, [
            'id' => 'nullable|exists:mgolongan,id',
            'golongan' => 'required|string',
            'nama' => 'required|string',
        ]);
        if ($validator->fails()) return back()->with('error','Gagal Menyimpan');
        try {
            $input = $validator->valid();
            if(isset($input['id'])){
                $model = Golongan::firstOrNew([
                    'id' => $input['id']
                ]);
            }else{
                $model = new Golongan();
            }
            $model->fill($input);    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
        $model->save();
        return back()->with('success','Berhasil Menyimpan');
    }
    public function storeUpdateJabatan(Request $request){
        $userId = Auth::id();
        
        $input = array_map('trim', $request->all());
        $validator = Validator::make($input, [
            'id' => 'nullable|exists:mjabatan,id',
            'nama' => 'required|string',
            'detail' => 'required|string',
        ]);
        if ($validator->fails()) return back()->with('error','Gagal Menyimpan');
        try {
            $input = $validator->valid();
            if(isset($input['id'])){
                $model = Jabatan::firstOrNew([
                    'id' => $input['id']
                ]);
            }else{
                $model = new Jabatan();
            }
            $model->fill($input);    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
        $model->save();
        return back()->with('success','Berhasil Menyimpan');
    }
    public function storeUpdatePendidikan(Request $request){
        $userId = Auth::id();
        
        $input = array_map('trim', $request->all());
        $validator = Validator::make($input, [
            'id' => 'nullable|exists:mpendidikan,id',
            'nama' => 'required|string',
        ]);
        if ($validator->fails()) return back()->with('error','Gagal Menyimpan');
        try {
            $input = $validator->valid();
            if(isset($input['id'])){
                $model = Pendidikan::firstOrNew([
                    'id' => $input['id']
                ]);
            }else{
                $model = new Pendidikan();
            }
            $model->fill($input);    
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
        $model->save();
        return back()->with('success','Berhasil Menyimpan');
    }
    
}
