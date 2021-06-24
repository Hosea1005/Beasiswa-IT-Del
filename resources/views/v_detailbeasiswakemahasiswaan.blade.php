@extends('layout.v_detailbeasiswakemahasiswaan')
@section('title','Detail')
@section('content')
 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="/home">
          <img src="/assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/home">
                <!-- <i class="ni ni-tv-2 text-primary"></i> -->
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <!-- <i class="ni ni-pin-3 text-primary"></i> -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Rekomendasi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                  <a class="dropdown-item" href="/home/rekomendasidosenwali">Dosen Wali</a>
                  <a class="dropdown-item" href="/home/rekomendasidosenwali">Keasramaan</a>
                </div>
              </li>
            </li>
                
          </ul>
          
        </div>
      </div>
    </div>
  </nav>
@endsection