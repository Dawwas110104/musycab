@extends('layouts.dashboard')

@section('head')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection

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
        @foreach($datas as $data)
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="gallery gallery-md">
                        <div class="gallery-item" data-image="../assets/img/newsimg03.jpg" data-title="Image 1"></div>
                    </div>
                    <div class="mb-2">{{ $data->nama }}</div>
                    <div>
                        <button id="vote{{$data->id}}" class="btn btn-success" onclick="vote({{ $data->id }})">Vote</button>
                        <button id="unVote{{$data->id}}" class="btn btn-danger hidden" onclick="unVote({{ $data->id }})">Batalkan Vote</button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link fade show active" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" id="home-tab3" data-toggle="tab" href="#visi" role="tab"
                                aria-controls="home" aria-selected="true">Visi</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fade show"  type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" id="profile-tab3" data-toggle="tab" href="#misi" role="tab"
                                aria-controls="profile" aria-selected="false">Misi</button>
                        </li>
                    </ul>
                    <div class="tab-content " id="myTabContent2">
                        <div class="collapse" id="collapseExample1" id="visi" role="tabpanel" aria-labelledby="home-tab3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.
                        </div>
                        <div class="collapse" id="collapseExample2" id="misi" role="tabpanel" aria-labelledby="profile-tab3">
                            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est
                            lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis
                            iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('js')
    <script>
        function vote(id){
            document.getElementById("vote" + id).classList.add("hidden");  // Add a highlight class
            document.getElementById("unVote" + id).classList.remove("hidden");  // Add a highlight class
        }  
        
        function unVote(id){
            document.getElementById("vote" + id).classList.remove("hidden");  // Add a highlight class
            document.getElementById("unVote" + id).classList.add("hidden");  // Add a highlight class
        }
        
    </script>
@endsection