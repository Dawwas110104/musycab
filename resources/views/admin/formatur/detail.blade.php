@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color:#262626">Formatur</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#">Data User</a></div>
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

    <div class="section-body">
        {{-- <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
            </div>
        </div> --}}
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h4 style="color:#262626">Detail Calon Formatur</h4>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="gallery gallery-md">
                        <div class="gallery-item" style="
                        margin-top: 30px;
                        margin-right: 0px;
                        margin-bottom: 0px;
                        margin-left: 0px;
                        width: 300px; height: 300px;" data-toggle="modal" data-target="#foto{{ $data->id }}"
                            data-image="{{ asset('image/' . $data->image) }}" data-title="Image 1"></div>
                    </div>
                </div>
                <div class="col-7">
                    <form action="{{ route('formatur.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" type="text" class="form-control" required value="{{ $data->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="ttl" type="date" class="form-control" value="{{ $data->ttl }}">
                            </div>
                            <div class="form-group">
                                <label>Asal Ranting / Cabang</label>
                                <input name="asal" type="text" class="form-control" value="{{ $data->asal }}">
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <input name="bidang" type="text" class="form-control" value="{{ $data->bidang }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telpon Aktif</label>
                                <input name="telp" type="text" class="form-control" value="{{ $data->telp }}">
                            </div>
                            <div class="form-group">
                                <label>Riwayat Perkaderan</label>
                                <textarea name="riwayat" class="form-control">{{ $data->riwayat }}</textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label>Visi</label>
                                <textarea name="visi" class="form-control" required>{{ $data->visi }}</textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label>Misi</label>
                                <textarea name="misi" class="form-control" required>{{ $data->misi }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection