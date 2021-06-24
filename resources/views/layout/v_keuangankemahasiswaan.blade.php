
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
      @php
          $kode_unik = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890zyxwvutsrqponmlkjihgfedcba"), 14, 10);
      @endphp
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <center><h3 class="mb-0">Permohonan Dana</h3></center>
                </div>
              </div>
              <div class="col">
               <button type="submit" name="upload" class="btn btn-sm btn-success" disabled>Lakukan Request</button>
               <a href="/home/lihatdaftarpermohonan"><button type="submit" name="upload" class="btn btn-sm btn-success">Lihat Daftar Permohonan</button></a>
              </div>
              <form action="{{ url('store-input-fields') }}" method="POST">
                @csrf
              <table class="table align-items-center table-flush"> 
                <tr>
                  <td>Tahun Anggaran</td>
                  <td><select class="form-control" id="exampleFormControlSelect1" name="tahun">
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      
    </select></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><input type="date" class="form-control form-control-sm" type="text" placeholder="" name="tanggal"></td>
                </tr>
                <tr>
                  <td>Unit</td>
                  <td><select name="unit" id="" class="form-control form-control-sm">
                      @foreach($beasiswa as $element_each)
                    <option value="{!! $element_each->nama_beasiswa !!}">{!! $element_each->nama_beasiswa !!}</option>
                    @endforeach
                      </select></td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td><input class="form-control form-control-sm" type="text" placeholder="" name="nominal" required></td>
                </tr>
                
                  <input class="form-control form-control-sm" type="hidden" placeholder="" name="kd" value="{{ $kode_unik }}" readonly>
      
              </table>
              <table class="table align-items-center table-flush" id="dynamicAddRemove">  
                <thead class="thead-light">
                  <tr>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Sisa</th>
                    <th>Kode Budget</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td><input class="form-control form-control-sm" name="addMoreInputFields[0][keterangan]" type="text" placeholder="" required></td>
                  <td><input class="form-control form-control-sm" name="addMoreInputFields[0][jumlah]" type="text" placeholder="" required></td>
                  <td><input class="form-control form-control-sm" name="addMoreInputFields[0][sisa]" type="text" placeholder="" required></td>
                  <td><input class="form-control form-control-sm" name="addMoreInputFields[0][kode]" type="text" placeholder="" required></td>
                  <td><input class="form-control form-control-sm" type="hidden" placeholder="" name="addMoreInputFields[0][kd]" value="{{ $kode_unik }}" readonly></td>
                  <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                </tr>
                </tbody>
              </table>
              <table class="table align-items-center table-flush"> 
                <tr>
                  <td>Terbilang</td>
                  <td><input class="form-control form-control-sm" type="text" placeholder="" name="terbilang" required></td>
                </tr>
                
                
                <tr>
                <td>
                </td>
                <td><button type="submit" name="upload" class="btn btn-success float-right" >Kirim</button></td>
                </tr>
              </table>
              </form>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              
            </div>

        </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][keterangan]" placeholder="Enter subject" class="form-control" required/></td><td><input type="text" name="addMoreInputFields[' + i +
            '][jumlah]" placeholder="Enter subject" class="form-control" required/></td><td><input type="text" name="addMoreInputFields[' + i +
            '][sisa]" placeholder="Enter subject" class="form-control" required/></td><td><input type="text" name="addMoreInputFields[' + i +
            '][kode]" placeholder="Enter subject" class="form-control" required/></td><td><input type="hidden" name="addMoreInputFields[' + i +
            '][kd]" placeholder="Enter subject" class="form-control" value="{{ $kode_unik }}" readonly /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

</html>
