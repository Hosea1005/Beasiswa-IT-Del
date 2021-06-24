<!DOCTYPE html>
<html>
<head>
	<title>Laporan anggaran Prodi</title>

    <style>
      <style>
      .page-break{
        page-break-after: always;
      }
        .head{
            text-align:center;
            border-color: inherit;
            font-weight: bold;
        }

        /* table{
            border-collapse: collapse;
        } */
    </style>
</head>
<body>
<div class="container-fluid mt--6">
      
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
                  <td>{{ $permohonan->nominal }}</td>
                </tr>
              </table>
              
              <table class="table align-items-center table-flush">  
                <thead class="thead-light">
                  <tr>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Sisa</th>
                    <th>Kode</th>
                  </tr>
                </thead>
                @php( $dana = DB::table('danas')->where('kd', $permohonan->kd)->get())  
                @foreach ($dana as $data)
                <tr>
                  <td>{{ $data->keterangan }}</td>
                  <td>{{ $data->jumlah }}</td>
                  <td>{{ $data->sisa }}</td>
                  <td>{{ $data->kode }}</td>
                </tr>
                @endforeach
              </table>
              <div class="page-break">
               <h3>Pemohon</h3>
              <table class="table" style="margin: 50px;">  
                <thead>
                  <tr>
                    <th>Penerima Tugas  </th>
                    <th>Atasan</th>
                    <th>Controller</th>
                  </tr>
                </thead>
                <td>
                <br>
                <br>
                <br>
                </td>
                <tr>
                  <td>Yepta Z Samosir </td>
                  <td>Lamsihar Sirait </td>
                  <td>Yesiska Gultom </td>
                </tr>
              </table>
              </div>
              {{--
              <table class="table" style="margin: 50px;">  
                <thead>
                  <tr>
                    <th>Bag.Keuangan  </th>
                    <th>WR II</th>
                    <th>Penerima Dana</th>
                  </tr>
                </thead>
                <td>
                
                <br>
                <br>
                <br>
                </td>
                <tr>
                  <td>Rusneni Vitaria</td>
                  <td>Hosea Hutauruk:</td>
                  <td>Valentine Trihandayani</td>
                </tr>
              </table>
              <hr>
              <center><h3 style="font-weight: bold;">Laporan Pertanggungjawaban</h3></center>
              <table class="table align-items-center table-flush"> 
                <tr>
                  <td>Terbilang</td>
                  <td>Empat Juta Ribu Rupiah</td>
                </tr>
                <tr>
                  <td>Dokumen Pendukung</td>
                </tr>
                <tr>
                  <td></td>
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
                    <td>4000000</td>
                </tr>
                <tr>
                    <td>2. Sisa Dana</td>
                    <td>150000</td>
                </tr>
                <tr>
                    <td>3. Tanggal</td>
                    <td>17/05/2021</td>
                </tr>
              </table>
              <br>
              <br>
              <table class="table" style="margin : 50px">  
                <thead>
                  <tr>
                    <th>Bag.Keuangan  </th>
                    <th>WR II</th>
                    <th>Penerima Dana</th>
                  </tr>
                </thead>
                <td>
                <br>
                <br>
                <br>
                </td>
                <tr>
                  <td>Rusneni Vitaria</td>
                  <td>Hosea Hutauruk</td>
                  <td>Valentine Trihandayani</td>
                </tr>
              </table>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              
            </div> --}}

        </div>

        
        
      </div>
      </div>
</div>
 </body>
 
  </html>