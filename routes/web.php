<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);
Route::get('/guru',[GuruController::class,'index']);
// Route::view('/siswa','v_siswa');
// Route::view('/user','v_user');

Auth::routes();


// Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');

//Hak akses untuk admin
Route::group(['middleware' => 'mahasiswa'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/home/detail/{id_peng}', [App\Http\Controllers\HomeController::class, 'detailPengumuman']);
Route::get('/home/cari', [App\Http\Controllers\HomeController::class, 'searchBeasiswa']);
Route::get('/home/detailbeasiswa/{id_peng}', [App\Http\Controllers\HomeController::class, 'detailBeasiswa']);
Route::get('/home/deletebeasiswa/{id_beasiswa}', [App\Http\Controllers\HomeController::class, 'deleteBeasiswa']);

Route::get('/home/daftarbeasiswa/{id_beasiswa}', [App\Http\Controllers\HomeController::class, 'daftarBeasiswa']);

Route::get('/home/add', [App\Http\Controllers\HomeController::class, 'addPengumuman']);

Route::post('/home/insertpeng', [App\Http\Controllers\HomeController::class, 'insertPengumuman']);
Route::post('/home/insertbea', [App\Http\Controllers\HomeController::class, 'insertBeasiswa']);
Route::post('/home/insertdaftarbeasiswa', [App\Http\Controllers\HomeController::class, 'insertDaftarBeasiswa']);

Route::get('/home/edit/{id_peng}', [App\Http\Controllers\HomeController::class, 'editPengumuman']);

Route::post('/home/updatepeng/{id_peng}', [App\Http\Controllers\HomeController::class, 'updatePengumuman']);

Route::get('/home/delete/{id_peng}', [App\Http\Controllers\HomeController::class, 'deletePengumuman']);

Route::get('/home/informasibeasiswa', [App\Http\Controllers\HomeController::class, 'informasibeasiswa']);

Route::get('/home/datamahasiswapendaftar', [App\Http\Controllers\HomeController::class, 'datamahasiswapendaftar']);

Route::get('/home/datamahasiswapenerima', [App\Http\Controllers\HomeController::class, 'datamahasiswapenerima']);

Route::get('/home/keuangankemahasiswaan', [App\Http\Controllers\HomeController::class, 'keuangankemahasiswaan']);
Route::post('/home/importexcel', [App\Http\Controllers\HomeController::class, 'import']);


Route::get('/home/rekomendasi', [App\Http\Controllers\HomeController::class, 'rekomendasi']);

Route::get('/home/ubahinformasibeasiswa/{id_beasiswa}', [App\Http\Controllers\HomeController::class, 'ubahinformasibeasiswa']);

Route::post('/home/updatebea/{id_beasiswa}', [App\Http\Controllers\HomeController::class, 'updateBeasiswa']);


Route::get('/home/detailpendaftar/{id_pendaftaran}', [App\Http\Controllers\HomeController::class, 'detailpendaftar']);

Route::get('/home/deletependaftar/{id_pendaftaran}', [App\Http\Controllers\HomeController::class, 'deletependaftar']);

Route::get('/home/deletepenerima/{id_pendaftaran}', [App\Http\Controllers\HomeController::class, 'deletepenerima']);

Route::get('/home/ubahdatamahasiswapendaftar', [App\Http\Controllers\HomeController::class, 'ubahdatamahasiswapendaftar']);

Route::get('/home/ubahdatamahasiswapenerima', [App\Http\Controllers\HomeController::class, 'ubahdatamahasiswapenerima']);

Route::get('/home/detailpenerima/{id_pendaftaran}', [App\Http\Controllers\HomeController::class, 'detailpenerima']);

Route::get('/home/detailkeuangan', [App\Http\Controllers\HomeController::class, 'detailkeuangan']);

Route::get('/home/rekomendasidosenwali', [App\Http\Controllers\HomeController::class, 'rekomendasidosenwali']);

Route::get('/home/rekomendasikeasramaan', [App\Http\Controllers\HomeController::class, 'rekomendasikeasramaan']);

Route::get('/home/cetakpdfrekomendasidosen', [App\Http\Controllers\HomeController::class, 'cetakpdfrekomendasidosen']);

Route::get('/home/detailbeasiswakemahasiswaan/{id_beasiswa}', [App\Http\Controllers\HomeController::class, 'detailbeasiswakemahasiswaan']);

Route::get('/home/cetakpdfrekomendasikeasramaan', [App\Http\Controllers\HomeController::class, 'cetakpdfrekomendasikeasramaan']);

Route::get('/home/tambahinformasibeasiswa', [App\Http\Controllers\HomeController::class, 'tambahinformasibeasiswa']);

Route::get('/home/lihatdaftarpermohonan', [App\Http\Controllers\HomeController::class, 'lihatdaftarpermohonan']);

Route::get('/home/lihatpermohonan/{id_per}', [App\Http\Controllers\HomeController::class, 'lihatpermohonan']);

Route::get('/home/lihatpermohonan/keu/{id_per}', [App\Http\Controllers\HomeController::class, 'lihatpermohonanKeu']);

Route::get('/home/cetakpdfpermohonandana/{id_per}', [App\Http\Controllers\HomeController::class, 'cetakpdfpermohonandana']);

Route::post('/store-input-fields', [App\Http\Controllers\HomeController::class, 'dana']);

Route::post('/home/apper/{id_per}', [App\Http\Controllers\HomeController::class, 'approvepermohonan']);

Route::post('/printdosenwali', [App\Http\Controllers\HomeController::class, 'pdosen']);
Route::post('/pendaftar/updatependaftar/{id_pendaftaran} ', [App\Http\Controllers\HomeController::class, 'updatePendaftar']);
Route::post('/pendaftar/updatepenerima/{id_pendaftaran} ', [App\Http\Controllers\HomeController::class, 'updatePenerima']);
Route::post('/printkeasramaan', [App\Http\Controllers\HomeController::class, 'pasrama']);


    Route::get('/admin', [AdminController::class, 'index'])->name('admin');


    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
