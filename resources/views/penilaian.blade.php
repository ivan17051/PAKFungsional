@extends('layouts.layout')

@section('penilaianStatus')
active
@endsection

@section('content')
@include('component.searchpegawai')
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
    <div class="card">
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
<script>
    // Datatable
    function showTable(id){
        if ($.fn.dataTable.isDataTable('#table1') ) {
            $('#table1').DataTable().clear();
            $('#table1').DataTable().destroy();
            $('#table1').empty();
        }

        let dataTable = $("#table1").DataTable({
            select:{
                className: 'dataTable-selector form-select'
            },
            processing: true,
            serverSide: true,
            ajax: {type: "POST", url: '{{route("penilaian.data")}}', data:{'_token':@json(csrf_token()), 'id':id}},
            columns: [
                { data:'pegawai.nip', title:'NIP'},
                { data:'pegawai.nama', title:'Nama'},
                { data:'awal', title:'Awal', render: function(e,d,row){return moment(row['awal']).format('L');} },
                { data:'akhir', title:'Akhir', render: function(e,d,row){return moment(row['akhir']).format('L');} },
                { data:'pak', title:'PAK'},
                { data:'id', title:'Aksi', render: function(e,d,row){return '<a class="btn btn-sm btn-outline-success"><i class="bi bi-pencil-square"></i></a>'} },
            ],
        });
    }
    
    callback=function(item){
        $('input[name=searchnama]').val(item['nama']);
        $('input[name=searchnip]').val(item['nip']);
        $('#searchpegawai').modal('hide');
        showTable(item['id']);
    }
</script>
@endsection