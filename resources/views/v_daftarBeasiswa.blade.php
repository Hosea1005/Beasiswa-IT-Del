@extends('layout.v_daftarBeasiswa')
@section('title','Detail')
@section('content')

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><h3>Form Pendaftaran</h3></button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Data Orang Tua</button>
 
</div>
<form  action="/home/insertdaftarbeasiswa" method="POST" enctype="multipart/form-data">
@csrf
<div id="London" class="tabcontent">
<div class="content form-group">
    <label><h4>Wajib Diisi <span style="color: red;">*</span> </h4></label>
    
  </div>
<div class="content form-group">
    <label><h3>Nim Mahasiswa</h3></label>
    <input type="text" name="nim_mahasiswa" class="form-control form-control " value="{{ Auth::user()->nim }}" readonly>
  </div>
  <div class="content form-group">
    <label><h3>Nama Mahasiswa</h3></label>
    <input type="text" name="nama_mahasiswa" class="form-control" value="{{ Auth::user()->name }}" readonly>
  </div>
  <div class="content form-group" style="display: none;">
    <label><h3>ID Mahasiswa</h3></label>
    <input  type="text" name="id_mahasiswa" class="form-control" value="{{ Auth::user()->id }}" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h3>Tahun Ajaran <span style="color: red;">*</span></h3></label>
    <select class="form-control" id="exampleFormControlSelect1" name="ta">
      <option value="2020/2021">2020/2021</option>
      <option value="2020/2021">2021/2022</option>
      <option value="2020/2021">2023/2024</option>
      <option value="2020/2021">2024/2025</option>
    </select>
  </div>
  <div class="content form-group">
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h3>Program Studi <span style="color: red;">*</span></h3></label>
    <select class="form-control" id="exampleFormControlSelect1" name="ps">
      <option value="DIII Teknologi Informasi">DIII Teknologi Informasi</option>
      <option value="DIII Teknologi Komputer">DIII Teknologi Komputer</option>
      <option value="DIV Teknologi Rekayasa Perangkat Lunak">DIV Teknologi Rekayasa Perangkat Lunak</option>
      <option value="S1 Informatika">S1 Informatika </option>
      <option value="S1 Manajemen Rekayasa">S1 Manajemen Rekayasa </option>
      <option value="S1 Sistem Informasi">S1 Sistem Informasi </option>
      <option value="S1 Teknik Bioproses">S1 Teknik Bioproses </option>
      <option value="S1 Teknik Elektro">S1 Teknik Elektro </option>

    </select>
  </div>
  </div>
  <div class="content form-group">
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h3>Jenis <span style="color: red;">*</span></h3></label>
    <select class="form-control" id="exampleFormControlSelect1" name="jenis">
      {{-- <option>Pilih . . .</option> --}}
      <option value="Yayasan Del">Yayasan Del</option>
      {{-- <option>. . . </option> --}}
    </select>
  </div>

  <div class="content form-group">
    <label><h3>Nama Beasiswa</h3></label>
    <input type="text" name="nama_bea" class="form-control " value="{{ $beasiswa->nama_beasiswa }}" readonly>
  </div>
  <div class="content form-group" style="display: none;">
    <label><h3>ID Beasiswa</h3></label>
    <input type="text" name="id_beasiswadaftar" class="form-control " value="{{ $beasiswa->id_beasiswa }}" readonly>
  </div>
  <div class="content form-group">
    <label><h3>IPK <span style="color: red;">*</span></h3></label>
    <input required type="text" name="ipk" class="form-control">
  </div>
  <div class="content form-group">
    <label><h3>Nilai Perilaku <span style="color: red;">*</span></h3></label>
    <input required type="text" name="np" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"><h3>Nama Bank</h3></label>
    <select class="form-control" id="exampleFormControlSelect1" name="nama_bank">
      <option value="BNI">BNI</option>
      <option value="BRI">BRI</option>
      <option value="Mandiri">Mandiri</option>
      <option value="BCA">BCA</option>
      <option value="Bank Sumut">Bank Sumut</option>
      <option value="BTPN">BTPN</option>
      <option value="Permata">Permata</option>
      <option value="CIMB">CIMB</option>
    </select>
  </div>
  <div class="content form-group">
    <label><h3>Nama Di Rekening Aktif <span style="color: red;">*</span></h3></label>
    <input required type="text" name="nama_rek" class="form-control">
  </div>
  <div class="content form-group">
    <label><h3>Nomor Rekening <span style="color: red;">*</span></h3></label>
    <input required type="text" name="no_rek" class="form-control">
  </div>
  <div class="form-group">
  <label><h3>Link Berkas <span style="color: red;">*</span></h3></label>    
                    <input type="text" class="form-control" name="berkas">
                    <div class="tex-danger">
                        @error('berkas')
                            {{ $message }}
                        @enderror
                    </div>
                    
  </div>
  </div>
</div>

<div id="Paris" class="tabcontent">
  <div class="form-group">
  <label><h3>Anak ke / dari</h3></label>
                    <input type="text" class="form-control @error('anak') is-invalid @enderror" name="anak" >
                    <div class="tex-danger">
                        @error('anak')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Nama Ayah</h3></label>
                    <input type="text" class="form-control @error('n_ayah') is-invalid @enderror" name="n_ayah" >
                    <div class="tex-danger">
                        @error('n_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Nama Ibu</h3></label>
                    <input type="text" class="form-control @error('n_ibu') is-invalid @enderror" name="n_ibu" >
                    <div class="tex-danger">
                        @error('n_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Alamat Orang Tua</h3></label>
                    <input type="text" class="form-control @error('a_ortu') is-invalid @enderror" name="a_ortu" >
                    <div class="tex-danger">
                        @error('a_ortu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Pekerjaan Ibu</h3></label>
                    <input type="text" class="form-control @error('p_ibu') is-invalid @enderror" name="p_ibu" >
                    <div class="tex-danger">
                        @error('p_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Pekerjaan Ayah</h3></label>
                    <input type="text" class="form-control @error('p_ayah') is-invalid @enderror" name="p_ayah" >
                    <div class="tex-danger">
                        @error('p_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>Total Penghasilan Orang Tua</h3></label>
                    <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" >
                    <div class="tex-danger">
                        @error('total')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>No Hp Ayah</h3></label>
                    <input type="text" class="form-control @error('no_ayah') is-invalid @enderror" name="no_ayah" >
                    <div class="tex-danger">
                        @error('no_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label><h3>No Hp Ibu</h3></label>
                    <input type="text" class="form-control @error('no_ibu') is-invalid @enderror" name="no_ibu" >
                    <div class="tex-danger">
                        @error('no_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary float-right">Kirim</button>
  <br>
  
</div>

<!-- <div id="Tokyo" class="tabcontent">
  <div class="form-group">
  <label><h3>Link Berkas</h3></label>    
                    <input type="text" class="form-control" name="berkas">
                    <div class="tex-danger">
                        @error('berkas')
                            {{ $message }}
                        @enderror
                    </div>
                    <br>
  <button type="submit" class="btn btn-primary float-right">Kirim</button>
  <br>
</div> -->
</form>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<!-- <form  action="/home/insertdaftarbeasiswa" method="POST" enctype="multipart/form-data">
@csrf
  <div class="content form-group">
    <label>ID Beasiswa</label>
    <input type="text" name="id_beasiswadaftar" class="form-control " value="{{ $beasiswa->id_beasiswa }}" readonly>
  </div>
  <div class="content form-group">
    <label>Nama Beasiswa</label>
    <input type="text" name="nama_bea" class="form-control " value="{{ $beasiswa->nama_beasiswa }}" readonly>
  </div>
  <div class="content form-group">
    <label>ID Mahasiswa</label>
    <input type="text" name="id_mahasiswa" class="form-control " value="{{ Auth::user()->id }}" readonly>
  </div>
  <div class="content form-group">
    <label>Nama Mahasiswa</label>
    <input type="text" name="nama_mahasiswa" class="form-control" value="{{ Auth::user()->name }}" readonly>
  </div>
  <div class="content form-group">
    <label>Nim Mahasiswa</label>
    <input type="text" name="nim_mahasiswa" class="form-control" value="{{ Auth::user()->nim }}" readonly>
  </div>
  <div class="content form-group">
  <label>Tanggal Lahir</label>
    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" >
    <div class="tex-danger">
        @error('tgl_lahir')
            {{ $message }}
        @enderror
    </div>
  </div>
  <div class="content form-group">
  <label>Kota Lahir</label>
                    <input type="text" class="form-control @error('kota_lahir') is-invalid @enderror" name="kota_lahir" >
                    <div class="tex-danger">
                        @error('kota_lahir')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="content form-group">
  <label>Jenis Kelamin</label>
                    <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" >
                    <div class="tex-danger">
                        @error('jk')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Agama</label>
                    <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" >
                    <div class="tex-danger">
                        @error('agama')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Golongan Darah</label>
                    <input type="text" class="form-control @error('gd') is-invalid @enderror" name="gd" >
                    <div class="tex-danger">
                        @error('gd')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Kode Pos</label>
                    <input type="text" class="form-control @error('kp') is-invalid @enderror" name="kp" >
                    <div class="tex-danger">
                        @error('kp')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>E-mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ Auth::user()->email }}">
                    <div class="tex-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>No HP</label>
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" >
                    <div class="tex-danger">
                        @error('nohp')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Anak ke / dari</label>
                    <input type="text" class="form-control @error('saudara') is-invalid @enderror" name="saudara" >
                    <div class="tex-danger">
                        @error('saudara')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Nama Ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" >
                    <div class="tex-danger">
                        @error('nama_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Nama Ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" >
                    <div class="tex-danger">
                        @error('nama_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Alamat Orang Tua</label>
                    <input type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" name="alamat_ortu" >
                    <div class="tex-danger">
                        @error('alamat_ortu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Pekerjaan Ibu</label>
                    <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" >
                    <div class="tex-danger">
                        @error('pekerjaan_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Pekerjaan Ayah</label>
                    <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" >
                    <div class="tex-danger">
                        @error('pekerjaan_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Total Penghasilan Orang Tua</label>
                    <input type="text" class="form-control @error('penghasilan_ortu') is-invalid @enderror" name="penghasilan_ortu" >
                    <div class="tex-danger">
                        @error('penghasilan_ortu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>No Hp Ayah</label>
                    <input type="text" class="form-control @error('no_ayah') is-invalid @enderror" name="no_ayah" >
                    <div class="tex-danger">
                        @error('no_ayah')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>No Hp Ibu</label>
                    <input type="text" class="form-control @error('no_ibu') is-invalid @enderror" name="no_ibu" >
                    <div class="tex-danger">
                        @error('no_ibu')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Jumlah Tanggungan</label>    
                    <input type="text" class="form-control @error('jlh_tanggungan') is-invalid @enderror" name="jlh_tanggungan" >
                    <div class="tex-danger">
                        @error('jlh_tanggungan')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
  <div class="form-group">
  <label>Link Berkas</label>    
                    <input type="text" class="form-control" name="berkas">
                    <div class="tex-danger">
                        @error('berkas')
                            {{ $message }}
                        @enderror
                    </div>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
@endsection