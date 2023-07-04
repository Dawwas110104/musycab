<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" href="public/assets/img/favicon.ico">
  <title>Evote | Musycab</title>
  <link rel="icon" type="images/x-icon" href="{{asset('assets/images/evote.png')}}" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">

  <!-- Chocolate Gallery -->
  <link rel="stylesheet" href="{{ asset('assets/css/chocolat.css') }}" type="text/css" media="screen" >

  <!-- CSS Tambahan -->
  @yield('head')
  
</head>

<body class="@if(Auth::user()->role_id == 2) sidebar-mini @endif">

  @if(Auth::user()->status == 1)
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            @if(Auth::user()->role_id == 1)
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            @endif
          </ul>
        </form>

        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }} </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              <!-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->
            </div>
          </li>
        </ul>
      </nav>

      @if(Auth::user()->role_id == 1)
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Evote PC IPM Sepanjang</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">IPM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{ route('admin.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Data</li>
              <li class="nav-item">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Data User</span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('formatur.index') }}">Data Formatur</a></li>
                  <li><a href="{{ route('pemilih.index') }}">Data Pemilih</a></li>
                </ul>
              </li>
            </ul>
        </aside>
      </div>
      @endif
      
      <!-- Main Content -->
      <div class="main-content">
        @yield('header')
        @yield('content')
        @yield('footer')
        <!-- <section class="section">
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
                      <div class="card-stats-item-count">50</div>
                      <div class="card-stats-item-label">Sudah Memilih</div>
                    </div>

                    <div class="card-stats-item">
                      <div class="card-stats-item-count">25</div>
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
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Budget vs Sales</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                        <div class="media-title">oPhone S9 Limited</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">$68,714</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">$38,700</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{ asset('assets/img/products/product-4-50.png') }}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                        <div class="media-title">iBook Pro 2018</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">$107,133</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">$91,455</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{ asset('assets/img/products/product-1-50.png') }}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                        <div class="media-title">Headphone Blitz</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="34%"></div>
                            <div class="budget-price-label">$3,717</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$2,835</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{ asset('assets/img/products/product-3-50.png') }}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                        <div class="media-title">oPhone X Lite</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="45%"></div>
                            <div class="budget-price-label">$13,972</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="30%"></div>
                            <div class="budget-price-label">$9,660</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{ asset('assets/img/products/product-5-50.png') }}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                        <div class="media-title">Old Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="35%"></div>
                            <div class="budget-price-label">$7,391</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$5,472</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Best Products</h4>
                </div>
                <div class="card-body">
                  <div class="owl-carousel owl-theme" id="products-carousel">
                    <div>
                      <div class="product-item pb-3">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-4-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">iBook Pro 2018</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="text-muted text-small">67 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-3-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">oPhone S9 Limited</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                          </div>
                          <div class="text-muted text-small">86 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-1-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">Headphone Blitz</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                          </div>
                          <div class="text-muted text-small">63 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Top Countries</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-title mb-2">July</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Malaysia</div>
                            <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">United States</div>
                            <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-4">
                      <div class="text-title mb-2">August</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Palestine</div>
                            <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Germany</div>
                            <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Customers need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> -->
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="#">Hangker Sepanjang</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  @else
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              Whoopps, your account is'nt active yet. Please activated before you go!
            </div>
          </div>
        </div>
        <div class="row" style="display: flex; justify-content:center; padding-top: 50px;">
          <div class="col-2">
            <a class="dropdown-item has-icon btn-danger" href="{{ route('logout') }}"  style="color:#fff"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Hangker Sepanjang 2023
        </div>
      </div>
    </section>
  @endif
  
  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- <script src="{{ asset('assets/js/custom2.js') }}"></script> -->

  <script type="text/javascript" src="{{ asset('assets/js/chocolat.js') }}"></script>

  <!-- JS Tambahan -->
  @yield('js')
</body>
</html>
