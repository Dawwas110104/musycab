@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Statistik</div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $formaturs->count() }}</div>
                            <div class="card-stats-item-label">Calon Formatur</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $pemilihs->count() }}</div>
                            <div class="card-stats-item-label">Total Pemilih</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $sudahs }}</div>
                            <div class="card-stats-item-label">Sudah Memilih</div>
                        </div>

                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $belums }}</div>
                            <div class="card-stats-item-label">Belum Memilih</div>
                        </div>
                    </div>
                </div>
                <div class="card-wrap">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Perolehan Suara Formatur</div>
                    @foreach($formaturs as $formatur)
                    <?php 
                        $jumlah = 0;
                        foreach ($pilihans as $pilihan) {
                            if($formatur->id == $pilihan->untuk){
                                $jumlah++;
                            }
                        }
                    ?>
                    <div class="mb-4 mt-4"
                        style="padding-top: 15px; padding-right: 25px; padding-bottom: 15px; padding-left: 25px;">
                        <div class="text-small float-right font-weight-bold text-muted">{{ $jumlah }}</div>
                        <div class="font-weight-bold mb-1">{{ $formatur->nama }}</div>
                        <div class="progress" data-height="5">
                            <div class="progress-bar" role="progressbar" data-width="{{ number_format($jumlah / ($sudahs + $belums) * 100, 2) }}%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @endforeach
                    <div class="card-wrap">
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection