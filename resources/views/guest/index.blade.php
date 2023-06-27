@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>E-Vote IPM Sepanjang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a>Pilih Calon Formatur</a></div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4>Pilih Calon Formatur</h4>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="gallery gallery-md">
                        <div class="gallery-item" data-image="../assets/img/news/img03.jpg" data-title="Image 1"></div>
                    </div>
                    <div class="mb-2">Joko Widodo</div>
                    <button class="btn btn-primary" id="toastr-1">Vote</button>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#visi" role="tab"
                                aria-controls="home" aria-selected="true">Visi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#misi" role="tab"
                                aria-controls="profile" aria-selected="false">Misi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="visi" role="tabpanel" aria-labelledby="home-tab3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                        </div>
                        <div class="tab-pane fade" id="misi" role="tabpanel" aria-labelledby="profile-tab3">
                            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est
                            lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis
                            iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-2">Anies Baswedan</div>
                    <button class="btn btn-primary" id="toastr-2">Vote</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-2">Ganjar Pranowo</div>
                    <button class="btn btn-primary" id="toastr-3">Vote</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-2">Prabowo Subianto</div>
                    <button class="btn btn-primary" id="toastr-4">Launch</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection