@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pemilih</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data User</a></div>
            <div class="breadcrumb-item">Pemilih</div>
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
                    <h4>Data Pemilih</h4>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($datas as $data)
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->asal }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->password }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="{{ route('pemilih.hapus', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#detail_modal">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
      <form action="{{ route('pemilih.tambah') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="visi" class="col-sm-3 col-form-label">Asal</label>
                    <div class="col-sm-9">
                        <select name="asal" class="form-control">
                            <option value="MTs Muhammadiyah 1 Taman">MTs Muhammadiyah 1 Taman</option>
                            <option value="SMP Muhammadiyah 2 Taman">SMP Muhammadiyah 2 Taman</option>
                            <option value="SMA Muhammadiyah 1 Taman">SMA Muhammadiyah 1 Taman</option>
                            <option value="SMK Muhammadiyah 1 Taman">SMK Muhammadiyah 1 Taman</option>
                            <option value="SMK Muhammadiyah 2 Taman">SMK Muhammadiyah 2 Taman</option>
                        </select>
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

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table-1').DataTable();
    });
</script>
@endpush