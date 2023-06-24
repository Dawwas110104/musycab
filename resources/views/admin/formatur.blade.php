@extends('layouts.dashboard')

{{-- Data Table --}}
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

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

    <div class="card">
        <div class="card-header">
                <div class="col">
                    <h4>Data Calon Formatur</h4>
                </div>
                <div class="col">
                    <div class="float-right">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>
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
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>Joko Widodo</td>
                            <td>
                                <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#detail_modal">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail -->
<div class="modal fade" id="detail_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Detail Data Calon Formatur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_formatur" name="id_formatur" value="">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="id_barang" class="form-label">Nama</label>
                            <p class="form-control">Joko Widodo</p>
                            <label for="id_barang" class="form-label">Foto</label>
                            <p class="form-control"></p>
                            <label for="id_barang" class="form-label">Visi</label>
                            <p class="form-control">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita adipisci error similique, nobis totam aliquam quam veritatis facere harum voluptate laboriosam autem, repellendus eum! Cum repudiandae ea consequatur voluptatem velit!
                            </p>
                            <label for="id_barang" class="form-label">Misi</label>
                            <p class="form-control">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi eos labore cupiditate enim reiciendis vel accusamus. Dolorem fuga pariatur, perspiciatis eaque, commodi doloribus optio eveniet, ea eos cumque ipsam voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Detail -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table-1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.formatur') }}",
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
</script>

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
