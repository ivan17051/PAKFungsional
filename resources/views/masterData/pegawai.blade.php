@extends('layouts.layout')

@section('title')
Data Pegawai
@endsection

@section('masterStatus')
active
@endsection

@section('pegawaiStatus')
active
@endsection

@section('content')
<!-- Modal Tambah -->
<div class="modal fade text-left modal-borderless" id="tambah" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pegawai</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('pegawai.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-body">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Unit Kerja</label>
                                <select class="choices form-select" id="unitkerja" name="unitkerja" required>
                                    @foreach($unitKerja as $unit)
                                    <option value="{{$unit->id}}">{{$unit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="first-name-vertical">Golongan</label>
                                <select class="choices form-select" id="golongan" name="golongan" required>
                                    @foreach($golongan as $unit)
                                    <option value="{{$unit->id}}">{{$unit->golongan}} - {{$unit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="first-name-vertical">Jabatan</label>
                                <select class="choices form-select" id="jabatan" name="jabatan" required>
                                    @foreach($jabatan as $unit)
                                    <option value="{{$unit->id}}">{{$unit->nama}} - {{$unit->detail}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">NIK</label>
                                <input type="text" id="nik" class="form-control"
                                    name="nik" placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">NIP</label>
                                <input type="text" id="nip" class="form-control"
                                    name="nip" placeholder="NIP" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">No. Kartu Pegawai</label>
                                <input type="text" id="nokartu" class="form-control"
                                    name="nokartu" placeholder="No Kartu Pegawai" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama</label>
                                <input type="text" id="nama" class="form-control"
                                    name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="first-name-vertical">Jenis Kelamin</label>
                                <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">Tempat Lahir</label>
                                <input type="text" id="tempatlahir" class="form-control"
                                    name="tempatlahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">Tanggal Lahir</label>
                                <input type="date" id="tanggallahir" class="form-control" name="tanggallahir" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">No. Telepon</label>
                                <input type="text" id="nohp" class="form-control" name="nohp" placeholder="No. Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first-name-vertical">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat">
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
                <button type="submit" class="btn btn-success ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade text-left modal-borderless" id="sunting" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sunting Data Pegawai</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('pegawai.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">NIK</label>
                                <input type="text" id="nik" class="form-control"
                                    name="nik" placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">NIP</label>
                                <input type="text" id="nip" class="form-control"
                                    name="nip" placeholder="NIP" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">No. Kartu Pegawai</label>
                                <input type="text" id="nokartu" class="form-control"
                                    name="nokartu" placeholder="No Kartu Pegawai" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama</label>
                                <input type="text" id="nama" class="form-control"
                                    name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="first-name-vertical">Jenis Kelamin</label>
                                <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">Tempat Lahir</label>
                                <input type="text" id="tempatlahir" class="form-control"
                                    name="tempatlahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">Tanggal Lahir</label>
                                <input type="date" id="tanggallahir" class="form-control" name="tanggallahir" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first-name-vertical">No. Telepon</label>
                                <input type="text" id="nohp" class="form-control" name="nohp" placeholder="No. Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first-name-vertical">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat">
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
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
              <h3>Data Pegawai</h3>
              <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
        <div class="card-header text-right">
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
          </div>
          <div class="card-body">
              <table class="table table-striped" id="table1">
                  <thead>
                      <tr>
                          <th hidden>id</th>
                          <th hidden>nik</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>No. Kartu</th>
                          <th hidden>tempatlahir</th>
                          <th hidden>tanggallahir</th>
                          <th hidden>jeniskelamin</th>
                          <th hidden>alamat</th>
                          <th>No. HP</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($pegawai as $unit)
                      <tr>
                          <td hidden>{{$unit->id}}</td>
                          <td hidden>{{$unit->nik}}</td>
                          <td>{{$unit->nip}}</td>
                          <td>{{$unit->nama}}</td>
                          <td>{{$unit->nokartu}}</td>
                          <td hidden>{{$unit->tempatlahir}}</td>
                          <td hidden>{{$unit->tanggallahir}}</td>
                          <td hidden>{{$unit->jeniskelamin}}</td>
                          <td hidden>{{$unit->alamat}}</td>
                          <td>{{$unit->nohp}}</td>
                          <td>
                            <a onclick="edit(this)" data-bs-toggle="modal" data-bs-target="#sunting" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                          </td>
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
@include('layouts.alert')
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    function edit(self){
        var $modal=$('#sunting');
        var tr = $(self).closest('tr');
      
        var id=tr.find("td:eq(0)").text().trim(); 
        var nik=tr.find("td:eq(1)").text().trim();
        var nip=tr.find("td:eq(2)").text().trim(); 
        var nama=tr.find("td:eq(3)").text().trim(); 
        var nokartu=tr.find("td:eq(4)").text().trim(); 
        var tempatlahir=tr.find("td:eq(5)").text().trim();
        var tanggallahir=tr.find("td:eq(6)").text().trim();
        var jeniskelamin=tr.find("td:eq(7)").text().trim();
        var alamat=tr.find("td:eq(8)").text().trim();
        var nohp=tr.find("td:eq(9)").text().trim(); 
        
        $modal.find('input[name=id]').val(id);
        $modal.find('input[name=nik]').val(nik);
        $modal.find('input[name=nip]').val(nip);
        $modal.find('input[name=nama]').val(nama);
        $modal.find('input[name=nokartu]').val(nokartu);
        $modal.find('input[name=tempatlahir]').val(tempatlahir);
        $modal.find('input[name=tanggallahir]').val(tanggallahir);
        $modal.find('select[name=jeniskelamin]').val(jeniskelamin).change();
        $modal.find('input[name=alamat]').val(alamat);
        $modal.find('input[name=nohp]').val(nohp);
    }
</script>
@endsection