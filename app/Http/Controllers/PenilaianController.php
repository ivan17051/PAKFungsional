<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('penilaian');
    }
    
    public function data(){
        $data = Penilaian::where('isactive',1);
        $datatable = Datatables::of($data);
        return $datatable->addIndexColumn()->make(true);
    }

    public function storeUpdate(Request $request){
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

        if(isset($input['id'])){
            $model = Penilaian::where('isactive',1)->where('id', $input['id'])->first();;
            $old = Penilaian::where('isactive',1)->orderBy('id', 'DESC')->first();
            $model->fill($input);
            $model->fill([
                "utama" => $old["utama_new"],
                "pendformal" => $old["pendformal_new"],
                "diklat" => $old["diklat_new"],
                "sttpl" => $old["sttpl_new"],
                "yankes" => $old["yankes_new"],
                "profesi" => $old["profesi_new"],
                "pengmas" => $old["pengmas_new"],
                "penyankes" => $old["penyankes_new"],
                "pak" => $old["pak_new"],
            ]);
            $model->fill([
                "idm" => $user->id,
            ]);
        }else{
            $model = new Penilaian();
            $model->fill($input);
            $model->fill([
                "idc" => $user->id,
                "idm" => $user->id,
            ]);
        }
        $model->save();
        return back()->with('success','Berhasil Menyimpan.');
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
        $model=Penilaian::find($idpenilaian);
        return view('report.pak', ['data'=>$idpenilaian]);
    }
}
