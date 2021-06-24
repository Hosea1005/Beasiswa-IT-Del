
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SIBeasiswa IT Del</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/')}}/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/')}}/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/')}}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/')}}/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
@if (count($errors) > 0){
  <div class="alert alert-danger">
    Upload validation error <br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
}
@endif

@if ($message = Session::get('succes'))
  <div class="alert alert-succes alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
  </div>
    
@endif
  <!-- <section class="content-header">
    <h1>
      @yield('title')
    </h1>
  </section>
  <section>
    @yield('content')
  </section> -->

   <!-- Sidenav -->
   <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="/home">
          <img src="{{asset('assets/')}}/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="/home">
                <!-- <i class="ni ni-tv-2 text-primary"></i> -->
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/home/informasibeasiswa">
                <!-- <i class="ni ni-planet text-orange"></i> -->
                <span class="nav-link-text">Informasi Beasiswa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/home/datamahasiswapendaftar">
                <!-- <i class="ni ni-tv-2 text-primary"></i> -->
                <span class="nav-link-text">Data Mahasiswa Pendaftar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/home/datamahasiswapenerima">
                <!-- <i class="ni ni-planet text-orange"></i> -->
                <span class="nav-link-text">Data Mahasiswa Penerima</span>
              </a>
            </li>
            <!-- <li class="nav-item">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Data Mahasiswa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/home/datamahasiswapendaftar">Pendaftar</a>
                  <a class="dropdown-item" href="/home/datamahasiswapendaftar">Penerima</a>
                </div>
              </li>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" href="/home/keuangankemahasiswaan">
                <!-- <i class="ni ni-single-02 text-yellow"></i> -->
                <span class="nav-link-text">Keuangan</span>
              </a>
            </li>
            
          </ul>
          
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            
            
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/assets/img/theme/team-4.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.show') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <!-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <!-- <i class="ni ni-user-run"></i> -->
                  <form  action="{{ route('logout') }}" method="POST" >
                      @csrf
                      <button action="{{ route('logout') }}" method="POST" type="submit" class="btn btn-default btn-flat float-right">Log out</button>
                  </form>
                  <!-- <span>Logout</span> -->
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <?php
                    $count = DB::table('danas')->where('kd', $permohonan->kd)->sum("jumlah");
                    $countSisa = DB::table('danas')->where('kd', $permohonan->kd)->sum("sisa");
                ?>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <center><h3 class="mb-0">Permohonan Dana</h3></center>
                </div>
              </div>
              
              <table class="table align-items-center table-flush"> 
                <tr>
                  <td>No. Permohonan</td>
                  <td>{{ $permohonan->no }}</td>
                </tr>
                <tr>
                  <td>Tahun Anggaran</td>
                  <td>{{ $permohonan->tahun }}</td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td>{{ $permohonan->tanggal }}</td>
                </tr>
                <tr>
                  <td>Unit</td>
                  <td>{{ $permohonan->unit }}</td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td>
                    @if ($count > 0 && $count <= 10000000)
                      < Rp.10.000.000
                    @elseif($count > 10000000 && $count <= 20000000)
                      > Rp.10.000.000
                        
                    @endif
                  </td>
                </tr>
              </table>
              <table class="table align-items-center table-flush">  
                <thead class="thead-light">
                  <tr>
                    <th>No. </th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Sisa</th>
                    <th>Kode Budget</th>
                  </tr>
                </thead>
                
                <?php $no=1 ?>
                @php( $dana = DB::table('danas')->where('kd', $permohonan->kd)->get())  
                @foreach ($dana as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td><input disabled class="form-control form-control-sm" type="text" placeholder="{{ $data->keterangan }}"></td>
                  <td><input disabled class="form-control form-control-sm" type="text" placeholder="{{ $data->jumlah }}"></td>
                  <td><input disabled class="form-control form-control-sm" type="text" placeholder="{{ $data->sisa }}"></td>
                  <td><input disabled class="form-control form-control-sm" type="text" placeholder="{{ $data->kode }}"></td>
                </tr>
                @endforeach
              
                <tr>
                <td></td>
                <td></td>
                <td><input disabled class="form-control form-control-sm" type="text" placeholder="Total"></td>
                <td><input disabled class="form-control form-control-sm" type="text" placeholder="Total"></td>
                </tr>
              </table>
              <h3>Pemohon</h3>
              <table class="table">  
                <thead>
                  <tr>
                    <th> Penerima Tugas  </th>
                    <th>Atasan</th>
                    <th>Controller</th>
                  </tr>
                </thead>
                <td>
                </td>
                <tr>
                  <td>(.................................)</td>
                  <td>(.................................)</td>
                  <td>(.................................)</td>
                </tr>
              </table>
              <br><br>
              <table class="table">  
                <thead>
                  <tr>
                    <th>Bag.Keuangan  </th>
                    <th>Wakil Rektor II</th>
                    <th>Penerima Dana</th>
                  </tr>
                </thead>
                <td>
                </td>
                <tr>
                <td>(.................................)</td>
                <td>(.................................)</td>
                <td>(.................................)</td>
                
                </tr>
              </table>
              <hr>
              <center><h3 style="font-weight: bold;">Laporan Pertanggungjawaban</h3></center>
              <table class="table align-items-center table-flush"> 
                <tr>
                  <td>Terbilang</td>
                  <td>{{ $permohonan->terbilang }} </td>
                </tr>
                <tr>
                  <td>Dokumen Pendukung</td>
                 
                </tr>
                <tr>
                  <td> </td>
                  <td>
                    <div class="input-group mb-3 row">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px"> Faktur
                      </div>
                    </div>
                    <div class="input-group mb-3 row">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px"> Proposal
                      </div>
                    </div>
                    <div class="input-group mb-3 row">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px"> Faktur Pajak
                      </div>
                    </div>
                    <div class="input-group mb-3 row">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px"> PO (Order Pembelian)
                      </div>
                    </div>
                    <div class="input-group mb-3 row">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px"> Lain-lain
                      </div>
                    </div>
                </td>
                </tr>
                <tr>
                <td>
                </td>
                </tr>
              </table>
                
                    
                  
              <table  class="align-items-center table-flush"> 
                <tr>
                  
                    <td>1. Realisasi</td>
                    
                    <td>{{ $count }}</td>
                </tr>
                <tr>
                    <td>2. Sisa Dana</td>
                    <td>{{ $countSisa }}</td>
                </tr>
                <tr>
                    <td>3. Tanggal</td>
                    <td>{{ $permohonan->tanggal }}</td>
                </tr>
              </table>
              <br>
              <br>
              <table class="table">  
                <thead>
                  <tr>
                    <th>Bag.Keuangan  </th>
                    <th>Wakil Rektor II</th>
                    <th>Penerima Dana</th>
                  </tr>
                </thead>
                <td>
                </td>
                <tr>
                <td>(.................................)</td>
                <td>(.................................)</td>
                <td>(.................................)</td>
                
                </tr>
              </table>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              
            </div>

        </div>

        
        
      </div>
        

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Sistem Informasi Beasiswa </a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Kel-10-PA3-DIV18</a>
              </li>
              
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
