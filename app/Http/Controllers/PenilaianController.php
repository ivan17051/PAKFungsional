<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Datatables;
use Validator;
use App\UnitKerja;
use App\Golongan;
use App\Pegawai;
use App\Jabatan;
use App\Pendidikan;
use App\Penilaian;

class PenilaianController extends Controller
{
    public function index(){
        $unitKerja = UnitKerja::where('nama', 'LIKE', 'Puskesmas%')->select('id', 'nama')->get();
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $pendidikan = Pendidikan::all();
        return view('penilaian', [ 'unitKerja'=>$unitKerja, 'golongan'=>$golongan, 'jabatan'=>$jabatan, 'pendidikan'=>$pendidikan ]);
    }
    
    public function data(Request $request){
        $data = Penilaian::where('isactive',1)->where('idpegawai',$request->input('id'))->with('pegawai','old')
                            ->orderBy('id', 'ASC');
        $datatable = Datatables::of($data);
        return $datatable->addIndexColumn()->make(true);
    }

    public function storeUpdate(Request $request){
        $user= Auth::user();
        $input = array_map('trim', $request->all());
        $validator = Validator::make($input, [
            "id"                => 'nullable|exists:penilaian,id',
            "awal"              => 'required_without:id|date',
            "akhir"             => 'required_without:id|date',
            "idpegawai"         => 'required_without:id|integer',
            "idjabatan"         => 'required_without:id|integer',
            "idgolongan"        => 'required_without:id|integer',
            "idpendidikan"      => 'required_without:id|integer',
            "idunitkerja"       => 'required_without:id|integer',
            "utama_new"         => 'required_without:id|numeric',
            "pendformal_new"    => 'required_without:id|numeric',
            "diklat_new"        => 'required_without:id|numeric',
            "sttpl_new"         => 'required_without:id|numeric',
            "yankes_new"        => 'required_without:id|numeric',
            "profesi_new"       => 'required_without:id|numeric',
            "pengmas_new"       => 'required_without:id|numeric',
            "penyankes_new"     => 'required_without:id|numeric',
        ]);

        if ($validator->fails()) return back()->with('error','Gagal menyimpan');
        
        $input = $validator->valid();
            
        if(isset($input['id']) AND $input['id']<>""){
            $model = Penilaian::where('isactive',1)->where('id', $input['id'])->first();
            $pak= $input["utama_new"] + $input["pendformal_new"] + $input["diklat_new"] 
                    + $input["sttpl_new"] + $input["yankes_new"] + $input["profesi_new"] 
                    + $input["pengmas_new"] + $input["penyankes_new"];
            $model->fill($input);
            $model->fill([
                "idm" => $user->id,
                "pak" => $pak,
            ]);

            //update inputan jika id terikat pada field "old" record lainnya
            $modelTerikat = Penilaian::where('isactive',1)->where('old', $input['id'])->first();
            if($modelTerikat){
                $modelTerikat->fill([
                    "utama" => $input["utama_new"],
                    "pendformal" => $input["pendformal_new"],
                    "diklat" => $input["diklat_new"],
                    "sttpl" => $input["sttpl_new"],
                    "yankes" => $input["yankes_new"],
                    "profesi" => $input["profesi_new"],
                    "pengmas" => $input["pengmas_new"],
                    "penyankes" => $input["penyankes_new"],
                    "old" => $input["id"],
                ]);
            }
        }else{
            $model = new Penilaian();
            $pak= $input["utama_new"] + $input["pendformal_new"] + $input["diklat_new"] 
                    + $input["sttpl_new"] + $input["yankes_new"] + $input["profesi_new"] 
                    + $input["pengmas_new"] + $input["penyankes_new"];
            $model->fill($input);
            $model->fill([
                "idc" => $user->id,
                "idm" => $user->id,
                "pak" => $pak,
            ]);

            // create new dengan referensi record
            $old = Penilaian::where('isactive',1)->orderBy('id', 'DESC')->first();
            if($old){
                $model->fill([
                    "utama" => $old["utama_new"],
                    "pendformal" => $old["pendformal_new"],
                    "diklat" => $old["diklat_new"],
                    "sttpl" => $old["sttpl_new"],
                    "yankes" => $old["yankes_new"],
                    "profesi" => $old["profesi_new"],
                    "pengmas" => $old["pengmas_new"],
                    "penyankes" => $old["penyankes_new"],
                    "old" => $old->id,
                ]);
            }
        }

        try {
            DB::beginTransaction();
            $model->save();
            if($modelTerikat) $modelTerikat->save();
            DB::commit();
            return back()->with('success','Berhasil Menyimpan.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error','Gagal memproses.');
        }
    }

    public function delete(Request $request){
        try {
            $model=Penilaian::find($request->input('id'));
            $model->idm=$userId;
            $model->isactive=0;
            $model->save();
            return back()->with('success','Berhasil menghapus');
        } catch (\Throwable $th) {
            return back()->with('error','Gagal menghapus');
        }
    }

    public function cetak(Request $request, $idpenilaian){
        $tipe=$request->input('tipe');
        $model=Penilaian::where('id', $idpenilaian)->with(['pegawai', 'jabatan', 'golongan', 'pendidikan', 'unitKerja'])->first();
        if($model->old){
            $old=Penilaian::where('id', $model->old)->with(['pegawai', 'jabatan', 'golongan', 'pendidikan', 'unitKerja'])->first();
        }
        else{
            $old=Penilaian::where('id', 0)->with(['pegawai', 'jabatan', 'golongan', 'pendidikan', 'unitKerja'])->first();
        }
        return view('report.pak', ['data'=>$model, 'old'=>$old, 'tipe'=>$tipe ]);
    }
}
