@extends('layouts.dashboard')

@section('head')
<!-- Data tables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<!-- Sweet Alert 2 -->
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
@endsection


@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color:#262626">Pemilih</h1>
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
                    <h4 style="color:#262626">Data Pemilih</h4>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <button class="btn btn-secondary" type="submit" data-toggle="modal"
                    data-target="#import">Import</button>
                    <button class="btn btn-secondary" type="submit" data-toggle="modal"
                    data-target="#Export">Export</button>
                    <a href="#" class="btn btn-sm btn-primary" style="color:#262626" data-toggle="modal" data-target="#tambah">Tambah</a>
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
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->asal }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->pass }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Ubah</a>
                                <button data-id="{{ $data->id }}" type="button" class="btn btn-sm btn-danger hapus">
                                    <i class="glyphicon glyphicon-trash"></i> Hapus
                                </button>
                            </td>
                            <td><a href="{{ route('pemilih.detail', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#detail_modal">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

</section>
{{-- Modal Import --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Import Data Calon Formatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-10" style="display:relative;">
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="position: relative; display: inline-block;">
                            <input name="foto" type="file" class="custom-file-input btn-primary" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Import Data</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Import --}}

{{-- Modal Export --}}
<div class="modal fade" id="Export" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Import Data Calon Formatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-10" style="display:relative;">
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="custom-file-input" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Export --}}

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

@section('js')
<!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
    // $(document).ready(function () {
    //     $('#table-1').DataTable();
    // });

    // Sweet Alert 2
    $('.hapus').click(function(){
        var id = $(this).data("id");
        var url = "{{ route('pemilih.hapus',":id") }}",
        url = url.replace(':id', id);

        console.log(url);
        Swal.fire({
            title: 'Are you sure?',
            text: "It will permanently deleted !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
            
                success: function (){
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        timer: 1000,
                    });
                    setTimeout(function(){
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                },

                error: function(){
                    alert('error');
                },
            })
            
        })
    
    })
</script>
@endsection