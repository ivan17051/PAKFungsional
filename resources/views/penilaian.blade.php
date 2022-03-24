@extends('layouts.layout')

@section('penilaianStatus')
active
@endsection

@section('content')
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
          <!-- <div class="card-header">
              Simple Datatable
          </div> -->
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
    let dataTable = $("#table1").dataTable({
        select:{
            className: 'dataTable-selector form-select'
        },
        processing: true,
        serverSide: true,
        ajax: {type: "POST", url: '{{route("penilaian.data")}}', data:{'_token':@json(csrf_token())}},
        columns: [
            { data:'idpegawai', title:'ID'},
        ],
    });
</script>
@endsection