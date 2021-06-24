<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\Dana;
use App\Models\PengumumanModel;
use App\Models\PendaftarModel;
use App\Models\BeasiswaModel;
use App\Models\KeuanganModel;
use Illuminate\Support\Facades\DB;
use App\Imports\KeuanganImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->GuruModel = new GuruModel;
        $this->middleware('auth');
        $this->PengumumanModel = new PengumumanModel();
        $this->Dana = new Dana();
        $this->GuruModel = new GuruModel();
        $this->BeasiswaModel = new BeasiswaModel();
        $this->PendaftarModel = new PendaftarModel();
        $this->KeuanganModel = new KeuanganModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        // $data = [
        //     'guru' => $this->GuruModel->allData(),
        // ];
        
        if (auth()->user()->level == 1) {
            if($request->has('cari')){
                $data =[ 
                    'beasiswa' => DB::table('beasiswa')->where('nama_beasiswa','like',"%".$request->cari."%")->get(),
                    'pengumuman' => DB::table('pengumuman')->where('judul_peng','like',"%".$request->cari."%")->get(),
            ];
            }
            else{
                $data = [
                'pengumuman' => $this->PengumumanModel->allData(),
                'beasiswa' => $this->BeasiswaModel->allData(),
            ];
        }
            return view('v_admin',$data);
        }
        if (auth()->user()->level == 2) {

            if($request->has('cari2')){
                $data =[ 
                    'beasiswa' => DB::table('beasiswa')->where('nama_beasiswa','like',"%".$request->cari2."%")->get(),
                    'pengumuman' => $this->PengumumanModel->allData(),
            ];
            }
            elseif($request->has('search')){
                $data =[ 
                    'beasiswa' => $this->BeasiswaModel->allData(),
                    'pengumuman' => DB::table('pengumuman')->where('judul_peng','like',"%".$request->search."%")->get(),
            ];
            }
            else{
                $data = [
                'pengumuman' => $this->PengumumanModel->allData(),
                'beasiswa' => $this->BeasiswaModel->allData(),
            ];
            }
            
            return view('v_home',$data);

        }
        if (auth()->user()->level == 3) {
            if($request->has('cari')){
            $data = [
                'permohonan' => DB::table('permohonan')->where('tahun','like',"%".$request->cari."%")->get(),
            ];
        }
            else{
                $data = [
                'permohonan' => $this->Dana->allDataPendaftar(),
                ];
            }
        
            return view('v_keuangan',$data);
        }
        
    }

    public function detailPengumuman($id_peng){
        
        
        $data = [
                'pengumuman' => $this->PengumumanModel->detailData($id_peng),
            ];
            return view('v_detailpengumuman',$data);
    }

    public function addPengumuman(){
        return view('v_addpengumuman');
    }

    public function insertBeasiswa(){
        // Request()->validate([
        //     'judul_peng' => 'required|max:255',
        //     'time_peng' => 'required',
        //     'isi_peng' => 'required',
        // ],[
        //     'judul_peng.required' => 'JUDUL WAJIB DI ISI!!!',
        // ],[
        //     'time_peng.required' => 'TIME WAJIB DI ISI!!!',
        // ],[
        //     'isi_peng.required' => 'Keterangan WAJIB DI ISI!!!',
        // ]);

        $data = [
            'nama_beasiswa' => Request()->nama_beasiswa,
            'jlh_daftar' => Request()->jlh_daftar,
            'deadline' => Request()->deadline,
            'info_beasiswa' => Request()->info_beasiswa,
            'curr' => Request()->curr,
            'persyaratan' => Request()->persyaratan,
            'deskripsi_beasiswa' => Request()->deskripsi_beasiswa
        ];

        $this->BeasiswaModel->addDataBeasiswa($data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Simpan');
    }

    public function insertPengumuman(){
        Request()->validate([
            'judul_peng' => 'required|max:255',
            'time_peng' => 'required',
            'isi_peng' => 'required',
        ],[
            'judul_peng.required' => 'JUDUL WAJIB DI ISI!!!',
        ],[
            'time_peng.required' => 'TIME WAJIB DI ISI!!!',
        ],[
            'isi_peng.required' => 'Keterangan WAJIB DI ISI!!!',
        ]);

        $data = [
            'judul_peng' => Request()->judul_peng,
            'time_peng' => Request()->time_peng,
            'isi_peng' => Request()->isi_peng,
            'craetor' => Request()->creator,
            'current' => Request()->current,
            'info_peng' => Request()->info_peng
        ];

        $this->PengumumanModel->addData($data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Simpan');
    }
    public function editPengumuman($id_peng){
        // if ($this->PengumumanModel->detailData($id_peng)) {
        //     abort(404);
        // }
        $data = [
                'pengumuman' => $this->PengumumanModel->detailData($id_peng),
            ];
        return view('v_editpengumuman', $data);
    }

    public function deletePengumuman($id_peng){
        $this->PengumumanModel->deleteData($id_peng);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Delete');
    }

    public function updatePengumuman($id_peng){
        Request()->validate([
            'judul_peng' => 'required|max:255',
            'time_peng' => 'required',
            'isi_peng' => 'required',
        ],[
            'judul_peng.required' => 'JUDUL WAJIB DI ISI!!!',
        ],[
            'time_peng.required' => 'TIME WAJIB DI ISI!!!',
        ],[
            'isi_peng.required' => 'Keterangan WAJIB DI ISI!!!',
        ]);

        $data = [
            'judul_peng' => Request()->judul_peng,
            'time_peng' => Request()->time_peng,
            'isi_peng' => Request()->isi_peng,
            'info_peng' => Request()->info_peng
        ];

        $this->PengumumanModel->editData($id_peng,$data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Update');
    }

    public function detailBeasiswa($id_beasiswa){
        
        
        $data = [
                'beasiswa' => $this->BeasiswaModel->detailDataBeasiswa($id_beasiswa),
            ];
            return view('v_detailBeasiswaMahasiswa',$data);
    }
    public function daftarBeasiswa($id_beasiswa){
        $data = [
                'beasiswa' => $this->BeasiswaModel->detailDataBeasiswa($id_beasiswa),
            ];
        return view('v_daftarBeasiswa',$data);
    }
    public function deleteBeasiswa($id_beasiswa){
        $this->BeasiswaModel->deleteDataBeasiswa($id_beasiswa);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Delete');
    }

    public function insertDaftarBeasiswa(){

        // Request()->validate([
        //     'berkas' => 'mimes:docx,doc,pdf,zip',
        // ]);

        // $file = Request()->berkas;
        // $fileName = Request()->nim_mahasiswa . '.' . $file->extension();
        // $file->move(public_path('berkasfile'), $fileName);


        $data = [
            'nama_bea' => Request()->nama_bea,
            'nim_mahasiswa' => Request()->nim_mahasiswa,
            'nama_mahasiswa' => Request()->nama_mahasiswa,
            'ps' => Request()->ps,
            'ta' => Request()->ta,
            'jenis' => Request()->jenis,
            'id_beasiswadaftar' => Request()->id_beasiswadaftar,
            'id_mahasiswa' => Request()->id_mahasiswa,
            'ipk' => Request()->ipk,
            'np' => Request()->np,
            'nama_bank' => Request()->nama_bank,
            'nama_rek' => Request()->nama_rek,
            'no_rek' => Request()->no_rek,
            // 'essaia' => Request()->essaia,
            // 'essaib' => Request()->essaib,
            // 'essaic' => Request()->essaic,
            'berkas' => Request()->berkas,
            'anak' => Request()->anak,
            'n_ayah' => Request()->n_ayah,
            'n_ibu' => Request()->n_ibu,
            'a_ortu' => Request()->a_ortu,
            'p_ayah' => Request()->p_ayah,
            'p_ibu' => Request()->p_ibu,
            'total' => Request()->total,
            'no_ayah' => Request()->no_ayah,
            'no_ibu' => Request()->no_ibu

        ];

        $this->BeasiswaModel->addData($data);
        return redirect()->route('home')->with('pesan','Berhasil Daftar Beasiswa');
    }

    public function searchBeasiswa(Request $request){
        $cari = $request->get('cari');
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('beasiswa')->where('nama_beasiswa','like',"%".$cari."%")->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('v_home',['beasiswa' => $data]);
    }

    public function informasibeasiswa(Request $request){
        if($request->has('cari')){
                $data =[ 
                    'beasiswa' => DB::table('beasiswa')->where('nama_beasiswa','like',"%".$request->cari."%")->get(),
                    'pengumuman' => DB::table('pengumuman')->where('judul_peng','like',"%".$request->cari."%")->get(),
            ];
            }
            else{
                $data = [
                'pengumuman' => $this->PengumumanModel->allData(),
                'beasiswa' => $this->BeasiswaModel->allData(),
            ];
        }
        return view('v_informasibeasiswa',$data);
    }

    public function datamahasiswapendaftar(Request $request){
        if($request->sr == "ipk"){
            $data = [
                'pendaftar' => DB::table('pendaftaran_beasiswa')->where('status_daftar', '>',0)-> orderBy('ipk', 'ASC')->get(),
                
                
            ];
        }
        elseif($request->sr == "peng"){
            $data = [
                'pendaftar' => DB::table('pendaftaran_beasiswa')->where('status_daftar', '>',0)-> orderBy('total', 'ASC')->get(),
                
                
            ];
        }
        else{
        $data = [
                'pendaftar' => DB::table('pendaftaran_beasiswa')->where('status_daftar', '>',0)->get(),
                
                
            ];
        }
        return view('v_datamahasiswapendaftar',$data);
    }

    public function datamahasiswapenerima(Request $request){
        
        $data = [
                'pendaftar' => DB::table('pendaftaran_beasiswa')->where('ta','like',"%".$request->sr."%")->where('status_daftar', '>',0)->get(),
                
                
            ];
        return view('v_datamahasiswapenerima',$data);
    }

    public function keuangankemahasiswaan(){
        $data =[ 
                    'beasiswa' => $this->BeasiswaModel->allData(),
                    // 'keasramaan' => $this->GuruModel->allDataKeasramaan(),
            ];
        return view('v_keuangankemahasiswaan',$data);
    }
    public function import(Request $request){
        // $path = $request->file('select_file')->getRealPath();

        // $data = Excel::import($path)->get();

        // if($data->count() > 0){
        //     foreach ($data->toArray() as $key => $value) {
        //         foreach($value as $row){
        //             $insert_data[] =  array(
        //                 'nama_beasiswa_keuangan'    =>  $row['nama_beasiswa_keuangan'],
        //                 'tahun_anggara'    =>  $row['tahun_anggaran'],
        //                 'nominal_biaya'    =>  $row['nominal_biaya'],

        //             );
        //         }
        //     }
        //     if(!empty($insert_data)){
        //         DB::table('keuangan')->insert($insert_data);
        //     }
        // }

        $validatedData = $request->validate([
 
           'file' => 'required',
 
        ]);
        Excel::import(new KeuanganImport, $request->file('file'));

        return back()->with('succes','Data Berhasil di Import');
    }

    public function rekomendasi(){
        return view('v_rekomendasi');
    }


    public function ubahinformasibeasiswa($id_beasiswa){
        $data = [
                'beasiswa' => $this->BeasiswaModel->detailDataBeasiswa($id_beasiswa),
            ];
        return view('v_ubahinformasibeasiswa',$data);
    }
    public function updateBeasiswa($id_beasiswa){
        $data = [
            'nama_beasiswa' => Request()->nama_beasiswa,
            'jlh_daftar' => Request()->jlh_daftar,
            'deadline' => Request()->deadline,
            'deskripsi_beasiswa' => Request()->deskripsi_beasiswa,
            'persyaratan' => Request()->persyaratan,
            'status' => Request()->status,
            'info_beasiswa' => Request()->info_beasiswa
        ];

        $this->BeasiswaModel->editDataBeasiswa($id_beasiswa,$data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Update');
    }

    public function detailpendaftar($id_pendaftaran){
        $data = [
                'pendaftar' => $this->PendaftarModel->detailDataPendaftar($id_pendaftaran),
            ];
        return view('v_detailpendaftar',$data);
    }

    public function deletependaftar($id_pendaftaran){
        // $data = [
        //         'pendaftar' => $this->PendaftarModel->detailDataPendaftar($id_pendaftaran),
        //     ];
        // return view('v_detailpendaftar',$data);
        $this->PendaftarModel->deleteDataPendaftar($id_pendaftaran);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Delete');
    }

    public function deletepenerima($id_pendaftaran){
        // $data = [
        //         'pendaftar' => $this->PendaftarModel->detailDataPendaftar($id_pendaftaran),
        //     ];
        // return view('v_detailpendaftar',$data);
        $this->PendaftarModel->deleteDataPendaftar($id_pendaftaran);
        return redirect()->back()->with('pesan','Data Berhasil Di Delete');
    }

    public function detailpenerima($id_pendaftaran){
        $data = [
                'penerima' => $this->PendaftarModel->detailDataPendaftar($id_pendaftaran),
            ];
        return view('v_detailpenerima',$data);
    }
    public function ubahdatamahasiswapendaftar(){
        
        return view('v_ubahdatamahasiswapendaftar');
    }
    public function ubahdatamahasiswapenerima(){
        return view('v_ubahdatamahasiswapenerima');
    }
    public function detailkeuangan(){
        return view('v_detailkeuangan');
    }
    public function rekomendasiDosenWali(){
        $data =[ 
                    'beasiswa' => $this->BeasiswaModel->allData(),
                    'dosen' => $this->GuruModel->allData(),
            ];

        return view('v_rekomendasidosenwali',$data);
    }
    public function rekomendasikeasramaan(){
        $data =[ 
                    'beasiswa' => $this->BeasiswaModel->allData(),
                    'keasramaan' => $this->GuruModel->allDataKeasramaan(),
            ];
        return view('v_rekomendasikeasramaan', $data);
    }
    public function cetakpdfrekomendasidosen(){
        return view('v_cetakpdfrekomendasidosen');
    }
    public function detailbeasiswakemahasiswaan($id_beasiswa){
        $data = [
                'beasiswa' => $this->BeasiswaModel->detailDataBeasiswa($id_beasiswa),
            ];
        return view('v_detailbeasiswakemahasiswaan',$data);
    }
    public function cetakpdfrekomendasikeasramaan(){
        return view('v_cetakpdfrekomendasikeasramaan');
    }
    public function tambahinformasibeasiswa(){
        return view('v_tambahinformasibeasiswa');
    }
    public function lihatdaftarpermohonan(){
        $data = [
                'permohonan' => $this->Dana->allDataPendaftar(),
            ];
        return view('v_lihatdaftarpermohonan' , $data);
    }

    public function lihatpermohonanKeu($id_per){
        $data = [
                'permohonan' => $this->Dana->detailDataPendaftar($id_per),
            ];
        return view('v_lihatpermohonankeu',$data);
    }

    public function lihatpermohonan($id_per){
        $data = [
                'permohonan' => $this->Dana->detailDataPendaftar($id_per),
            ];
        return view('v_lihatpermohonan',$data);
    }
    public function cetakpdfpermohonandana($id_per){
        $data = [
                'permohonan' => $this->Dana->detailDataPendaftar($id_per),
            ];
            $pdf = \PDF::loadView('v_cetakpdfpermohonandana', $data);
            return $pdf->download('SuratPermohonanDana.pdf');

    }

    public function pdosen(Request $request){
        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
            'nidn' => $request->input('nidn'),
            'tgl' => $request->input('tgl'),
            'nb' => $request->input('nb'),
            'ndw' => $request->input('ndw')
        ];
        $pdf = \PDF::loadView('v_cetakpdfrekomendasidosen', $data);
        return $pdf->download('SuratRekomendasiDosen.pdf');
    }

    public function pasrama(Request $request){
        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
            'tgl' => $request->input('tgl'),
            'nb' => $request->input('nb'),
            'asrama' => $request->input('asrama')
        ];
        $pdf = \PDF::loadView('v_cetakpdfrekomendasikeasramaan', $data);
        return $pdf->download('SuratRekomendasiKeasramaan.pdf');
    }

    public function updatePendaftar($id_pendaftaran){
        $data = [
            'status_daftar' => Request()->status_daftar
        ];

        $this->PendaftarModel->editData($id_pendaftaran,$data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Update');
    }

    public function updatePenerima($id_pendaftaran){
        $data = [
            'status_daftar' => Request()->status_daftar
        ];

        $this->PendaftarModel->editData($id_pendaftaran,$data);
        return redirect('/home/datamahasiswapenerima')->with('pesan','Data Berhasil Di Update');
    }

    public function dana(Request $request)
    {
        // $request->validate([
        //     'addMoreInputFields.*.keterangan' => 'required',
        //     'addMoreInputFields.*.jumlah' => 'required',
        //     'addMoreInputFields.*.sisa' => 'required',
        //     'addMoreInputFields.*.kode' => 'required',
        // ]);

        
     
        foreach ($request->addMoreInputFields as $key => $value) {
            Dana::create($value);
        }
        // Request()->validate([
        //     'judul_peng' => 'required|max:255',
        //     'time_peng' => 'required',
        //     'isi_peng' => 'required',
        // ],[
        //     'judul_peng.required' => 'JUDUL WAJIB DI ISI!!!',
        // ],[
        //     'time_peng.required' => 'TIME WAJIB DI ISI!!!',
        // ],[
        //     'isi_peng.required' => 'Keterangan WAJIB DI ISI!!!',
        // ]);

        $data = [
            // 'no' => Request()->no,
            'tahun' => Request()->tahun,
            'tanggal' => Request()->tanggal,
            'unit' => Request()->unit,
            'nominal' => Request()->nominal,
            'kd' => Request()->kd,
            'terbilang' => Request()->terbilang
        ];

        $this->Dana->addData($data);
     
        return back()->with('success', 'New subject has been added.');
    }

    public function approvepermohonan($id_per){
        // Request()->validate([
        //     'status' => 'required',
        //     'np' => 'required',
        // ]);

        $data = [
            'status' => Request()->status,
            'no' => Request()->no
        ];

        $this->Dana->editData($id_per,$data);
        return redirect()->route('home')->with('pesan','Data Berhasil Di Update');
    }
    
}
