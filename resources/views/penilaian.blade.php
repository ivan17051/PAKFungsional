@extends('layouts.layout')

@section('penilaianStatus')
active
@endsection

@section('content')
@include('component.searchpegawai')
<!-- Modal Tambah -->
<div class="modal fade text-left modal-borderless" id="tambah" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penilaian</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('penilaian.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id">
            <input type="hidden" name="idpegawai">
            <div class="modal-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <h6>Unit Kerja & Jabatan</h6>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Unit Kerja</label>
                                <select class="choices form-select" id="idunitkerja" name="idunitkerja" required>
                                    <!-- <option value="">--PILIH--</option> -->
                                    @foreach($unitKerja as $unit)
                                    <option value="{{$unit->id}}">{{$unit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="first-name-vertical">Golongan</label>
                                <select class="choices form-select" id="idgolongan" name="idgolongan" required>
                                    <!-- <option value="">--PILIH--</option> -->
                                    @foreach($golongan as $unit)
                                    <option value="{{$unit->id}}">{{$unit->golongan}} - {{$unit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="first-name-vertical">Jabatan</label>
                                <select class="choices form-select" id="idjabatan" name="idjabatan" required>
                                    <!-- <option value="">--PILIH--</option> -->
                                    @foreach($jabatan as $unit)
                                    <option value="{{$unit->id}}">{{$unit->nama}} - {{$unit->detail}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Pendidikan</label>
                                <select class="choices form-select" id="idpendidikan" name="idpendidikan" required>
                                    <!-- <option value="">--PILIH--</option> -->
                                    @foreach($pendidikan as $unit)
                                    <option value="{{$unit->id}}">{{$unit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h6>Masa Kerja</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Dari</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" name="awal" class="form-control" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar4-event"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Hingga</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="date" name="akhir" class="form-control" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar4-week"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h6>Penilaian</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">Unsur Utama</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="utama" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="utama_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">Pend. Formal</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="pendformal" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="pendformal_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">Diklat Fungs/Teknis</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="diklat" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="diklat_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">STTPL</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="sttpl" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="sttpl_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">YANKES</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="yankes" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="yankes_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">PROFESI</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="profesi" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="profesi_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">PENGAB. MASY.</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="pengmas" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="pengmas_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6 d-table">
                                    <p class="d-table-cell align-middle">PENUNJANG YANKES</p>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Lama</label>
                                        <input type="number" class="form-control" name="penyankes" placeholder="000" required role="excluded">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Baru</label>
                                        <input type="number" class="form-control" name="penyankes_new" placeholder="000" required role="new">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
                <span role="edit-buttons">
                    <button type="button" class="btn btn-warning text-dark" role="trigger-edit" onclick="edit()">Edit</button>
                    <button type="button" class="btn btn-light-danger" role="trigger-batal"  data-bs-dismiss="modal">Batal</button>
                </span>
                <button type="submit" class="btn btn-success ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Penilaian</h3>
              <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Pegawai</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#searchpegawai"><i class="bi bi-search"></i></button>
                                <input name="searchnama" type="text" class="form-control" placeholder="Nama" aria-label="nama" aria-describedby="nama" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput"></label>
                            <input name="searchnip" type="text" class="form-control" placeholder="NIP" disabled>
                        </div>
                    </div>
              </div>
          </div>
      </div>
    <div class="card" id="result-container" hidden>
        <div class="card-header text-end">
            <button type="button" class="btn btn-primary" onclick="tambah()" ><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  </section>
</div>
@endsection

@section('script')
@include('layouts.alert')
<script>
    var oTable;
    var $form = $('#tambah');
    var Total;
    var lastData;

    function tambah(){
        let today = moment().format("Y-MM-DD"); 
        $form.find('.modal-title').text('Tambah Penilaian');
        if(Total){
            let newDate = moment(lastData['awal']).add(1, 'days').format("Y-MM-DD"); 
            $form.find('[role=excluded]').attr('disabled',true)
            $('[name=id]').val('');
            $('[name=utama]').val(lastData['utama_new']);
            $('[name=pendformal]').val(lastData['pendformal_new']);
            $('[name=diklat]').val(lastData['diklat_new']);
            $('[name=sttpl]').val(lastData['sttpl_new']);
            $('[name=yankes]').val(lastData['yankes_new']);
            $('[name=profesi]').val(lastData['profesi_new']);
            $('[name=pengmas]').val(lastData['pengmas_new']);
            $('[name=penyankes]').val(lastData['penyankes_new']);
            $('[name=awal]').val(newDate);
            $('[name=akhir]').val(lastData['akhir']);

            choicesList['idunitkerja'].setChoiceByValue(lastData['idunitkerja']);
            choicesList['idgolongan'].setChoiceByValue(lastData['idgolongan']);
            choicesList['idjabatan'].setChoiceByValue(lastData['idjabatan']);
            choicesList['idpendidikan'].setChoiceByValue(lastData['idpendidikan']);
            $form.find('[name=awal]').attr('readonly',true);
        }else{
            $form.find('[role=excluded]').val('').attr('disabled',false)
            $form.find('[name=awal]').attr('readonly',false).val(today);
        }

        choicesList['idunitkerja'].enable();
        choicesList['idgolongan'].enable();
        choicesList['idjabatan'].enable();
        choicesList['idpendidikan'].enable();
        
        $form.find('[role=new]').attr('disabled',false).val('');
       
        $form.find('[name=akhir]').attr('disabled',false).val(today);;
        $form.find('[type=submit]').attr('hidden',false);
        $form.find('[role=trigger-edit]').attr('hidden',true);
        $form.find('[role=trigger-batal]').attr('hidden',true);
        $form.modal('show');
    }

    function show(self){
        var tr = $(self).closest('tr');
        let idx = oTable.row(tr)[0]
        var data = oTable.data()[idx];

        for(let key in data){
            if(key) $form.find('[name='+key+']').val(data[key]);
        }
        choicesList['idunitkerja'].setChoiceByValue(data['idunitkerja']).disable();
        choicesList['idgolongan'].setChoiceByValue(data['idgolongan']).disable();
        choicesList['idjabatan'].setChoiceByValue(data['idjabatan']).disable();
        choicesList['idpendidikan'].setChoiceByValue(data['idpendidikan']).disable();
        $form.find('.modal-title').text('Edit Penilaian');
        $form.find('[role=excluded]').attr('disabled',true);
        $form.find('[role=new]').attr('disabled',true);
        $form.find('[name=awal]').attr('readonly',true);
        $form.find('[name=akhir]').attr('disabled',true);
        $form.find('[type=submit]').attr('hidden',true);
        $form.find('[role=trigger-edit]').attr('hidden',false);
        $form.find('[role=trigger-batal]').attr('hidden',true);
        $form.modal('show');
    }

    function edit(){
        $form.find('[role=trigger-edit]').attr('hidden',true);
        $form.find('[role=trigger-batal]').attr('hidden',false);
        $form.find('[type=submit]').attr('hidden',false);
        $form.find('[role=new]').attr('disabled',false);

        choicesList['idunitkerja'].enable();
        choicesList['idgolongan'].enable();
        choicesList['idjabatan'].enable();
        choicesList['idpendidikan'].enable();
    }

    // Datatable
    function showTable(id){
        $('#result-container').attr('hidden',false);
        $('#tambah input[name=idpegawai]').val(id);

        if ($.fn.dataTable.isDataTable('#table1') ) {
            $('#table1').DataTable().clear();
            $('#table1').DataTable().destroy();
            $('#table1').empty();
        }

        oTable = $("#table1").DataTable({
            select:{
                className: 'dataTable-selector form-select'
            },
            scrollX: true,
            stateSave: true,
            searching: false,
            processing: true,
            serverSide: false,
            ajax: {type: "POST", url: '{{route("penilaian.data")}}', data:{'_token':@json(csrf_token()), 'id':id}},
            columns: [
                { data:'pegawai.nip', title:'NIP'},
                { data:'pegawai.nama', title:'Nama'},
                { data:'awal', title:'Awal', render: function(e,d,row){return moment(row['awal']).format('L');} },
                { data:'akhir', title:'Akhir', render: function(e,d,row){return moment(row['akhir']).format('L');} },
                { data:'pak', title:'PAK'},
                { data:'id', title:'Aksi', render: function(e,d,row){
                    return '<a class="btn btn-sm btn-outline-success" onclick="show(this)"><i class="bi bi-card-list"></i></a>&nbsp'+
                            '<a class="btn btn-sm btn-outline-primary" href="{{route("penilaian.cetak", ["idpenilaian" => "" ] )}}/'+row['id']+'" target="_blank"><i class="bi bi-receipt"></i></a>'
                } },
            ],
            initComplete: function(settings, data){
                Total=data['recordsTotal'];
                lastData= Total ? data['data'][Total-1] : null;
            }
        });
    }
    
    callback=function(item){
        sessionStorage.setItem('penilaian-filter', JSON.stringify(item));
        $('input[name=searchnama]').val(item['nama']);
        $('input[name=searchnip]').val(item['nip']);
        $('#searchpegawai').modal('hide');
        showTable(item['id']);
    }

    $(document).ready(function(){
        if(sessionStorage.hasOwnProperty('penilaian-filter')){
            let item = JSON.parse( sessionStorage.getItem('penilaian-filter'));
            callback(item);
        }
    })
</script>
@endsection