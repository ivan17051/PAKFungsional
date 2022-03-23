@extends('layouts.layout')

@section('masterStatus')
active
@endsection

@section('unitKerjaStatus')
active
@endsection

@section('content')
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Unit Kerja</h3>
              <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">DataTable</li>
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
                      <tr>
                          <th>Nama</th>
                          <th>Nama Alias</th>
                          <th>Alamat</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($unitKerja as $unit)
                      <tr>
                          <td>{{$unit->nama}}</td>
                          <td>{{$unit->nama_alias}}</td>
                          <td>{{$unit->alamat}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>

  </section>
</div>
@endsection

@section('script')
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection

@section('script')
    @include('layouts.alert')
@endsection