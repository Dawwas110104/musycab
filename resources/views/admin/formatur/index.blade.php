@extends('layouts.dashboard')

@section('head')
{{-- Data Table --}}
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

<!-- Chocolat -->
<link rel="stylesheet" href="{{ asset('assets/css/chocolat.css') }}" type="text/css" media="screen" >
<script type="module" src="{{ asset('assets/js/chocolat.js') }}"></script>

@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Formatur</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data User</a></div>
            <div class="breadcrumb-item">Formatur</div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4>Data Calon Formatur</h4>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah" >Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap datatables py-1 px-1" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Action</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1; ?>
                        @foreach($datas as $data)
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <div id="chocolat-parent" class="chocolat-parent">
                                    <a href="{{ asset('image/' . $data->image) }}" class="chocolat-image" title="Just an example">
                                        <div data-crop-image="100">
                                            <img alt="image" src="{{ asset('image/' . $data->image) }}" class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <!-- <img alt="image" src="{{ asset('image/' . $data->image) }}" width="35" data-toggle="tooltip" title="{{ $data->nama }}"> -->
                            </td>
                            <td>{{ $data->visi }}</td>
                            <td>{{ $data->misi }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="{{ route('formatur.hapus', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#detail_modal">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Formatur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('formatur.tambah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="visi" class="col-sm-3 col-form-label">Visi</label>
                    <div class="col-sm-9">
                        <input name="visi" type="text" class="form-control" id="visi" placeholder="Visi" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="misi" class="col-sm-3 col-form-label">Misi</label>
                    <div class="col-sm-9">
                        <input name="misi" type="text" class="form-control" id="misi" placeholder="Misi" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                        <input name="foto" type="file" class="custom-file-input" id="customFile" required>
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal  -->
@endsection

@section('js')
<script>
    $('.mark-done').on('click', function() {
        $('#table-1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('formatur.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nama', name: 'nama' },
                { data: 'foto', name: 'foto' },
                { data: 'visi', name: 'visi' },
                { data: 'misi', name: 'misi' },
                { data: 'action', name: 'action' },
                { data: 'detail', name: 'detail' }
            ]
        });
    });

    Chocolat(document.querySelectorAll('#chocolat-parent .chocolat-image'), {
        imageSize: 'contain',
    })
</script> 


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> --}}

<script src="{{ asset('assets/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
