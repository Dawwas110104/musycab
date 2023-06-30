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
              <div class="card-stats-item-count">11</div>
              <div class="card-stats-item-label">Calon Formatur</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">75</div>
              <div class="card-stats-item-label">Total Pemilih</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">75</div>
              <div class="card-stats-item-label">Sudah Memilih</div>
            </div>

            <div class="card-stats-item">
              <div class="card-stats-item-count">0</div>
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

</section>
@endsection