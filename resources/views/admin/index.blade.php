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
              <div class="card-stats-item-count">150</div>
              <div class="card-stats-item-label">Total Pemilih</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">150</div>
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

  <div class="col-lg-12 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Perolehan Suara Formatur</div>
          <div class="mb-4 mt-4" style="padding-top: 15px; padding-right: 25px; padding-bottom: 15px; padding-left: 25px;">
              <div class="text-small float-right font-weight-bold text-muted">75</div>
                <div class="font-weight-bold mb-1">Satrio Wicaksono</div>
                  <div class="progress" data-height="5">
                <div class="progress-bar" role="progressbar" data-width="50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="mb-4 mt-4" style="padding-top: 15px; padding-right: 25px; padding-bottom: 15px; padding-left: 25px;">
              <div class="text-small float-right font-weight-bold text-muted">53</div>
                <div class="font-weight-bold mb-1">Habib MEF</div>
                  <div class="progress" data-height="5">
                <div class="progress-bar" role="progressbar" data-width="35%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
      </div>
        <div class="card-wrap">
          <div class="card-body"></div>
        </div>
      </div>
    
  
</section>
@endsection