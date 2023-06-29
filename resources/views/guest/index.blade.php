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
                        <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1{{$data->id}}" aria-expanded="false" aria-controls="collapseExample1{{$data->id}}">
                            VISI
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2{{$data->id}}" aria-expanded="false" aria-controls="collapseExample2{{$data->id}}">
                            MISI
                        </button>
                        </p>
                        <div class="collapse" id="collapseExample1{{$data->id}}">
                            <p>
                            Menjadi Raja Bajak Laut
                            </p>
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}">
                            <p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </p>
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