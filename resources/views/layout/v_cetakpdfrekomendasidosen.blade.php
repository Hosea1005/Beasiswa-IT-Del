<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan anggaran Prodi</title>

    <style>
        .head{
            text-align:center;
            border-color: inherit;
            font-weight: bold;
        }

        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body >
  <div class="container-fluid tableProgram">
        
       <center> <img src="{{ storage_path('app/public/del.png') }}" height="80px"></center>
       {{-- <img src="{{ storage_path('app/public/dummy.jpg') }}" style="width: 200px; height: 200px"> --}}
        
  <div class="col-md-12 row" style="margin-top:10px;">
   </div>     
   <div>
   <div class="col-md-6 float-left" style="text-align: right;"><b>CONFIDENTIAL</b></div>
   <div class="col-md-6 float-left" style="text-align: right;">(diberikan langsung ke Bagian Kemahasiswaan)</div>
   <div class="col-md-12"><center><h3>SURAT REKOMENDASI DOSEN WALI</h3></center></div>
   </div>   

   <div>
        <!-- <center><h3>Institut Teknologi Del</h3></center> -->
        
   </div>
   <div class="col-md-12 row" style="margin-top:30px;">
   </div>  
     <div class="col-md-12 ">
         <div class="col-md-12">Dengan ini, saya yang bertanda tangan di bawah ini:</div>
         <table style="margin-left: 40px;">
            <tr>
                <td>Nama Dosen Wali </td>
                <td>: </td>
                <td>{{ $ndw }}</td>
            </tr>
            <tr>
                <td>NIDN </td>
                <td>: </td>
                <td>{{ $nidn }}</td>
            </tr>
         </table>
     </div>
     <div class="col-md-12 " style="margin-top: 40px;">
         <div class="col-md-12">memberikan/tidak memberikan rekomendasi (*) kepada mahasiswa yang namanya tertera di bawah ini:</div>
         <table style="margin-left: 40px;">
            <tr>
                <td>Nama Mahasiswa </td>
                <td>: </td>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>NIM </td>
                <td>: </td>
                <td>{{ Auth::user()->nim }}</td>
            </tr>
            <tr>
                <td>Angkatan </td>
                <td>: </td>
                <td>{{ $angkatan }}</td>
            </tr>
         </table>

     </div>
     <div class="col-md-12 " style="margin-top: 40px;">
         <div class="col-md-12">sebagai calon penerima {{ $nb }} TA. 2020/2021, dengan pertimbangan </div>
         <div class="col-md-4" style="margin-left: 30px;">................................................................................................................................................................................ <br>
         ................................................................................................................................................................................ <br>
         ................................................................................................................................................................................ <br>
         ................................................................................................................................................................................ <br>
         ................................................................................................................................................................................

 </div>

 <div class="col-md-12 " style="margin-top: 40px;">
         <div class="col-md-12" style="float: right;">Sitoluama, {{ $tgl }}</div>

     </div>

     <br>
     <br>
     <br>
     <br>
     <div class="col-md-12 " style="margin-top: 40px;">
         <div class="col-md-12" style="float: right;">(..................................)</div>

     </div>


     </div>
     <br>
     <br>
     <div class="col-md-12 " style="margin-top: 40px;">
         <div class="col-md-12">Keterangan: <br>
(*) coret yang tidak perlu
</div>

     </div>
  </div>
 </body>
 
  </html>