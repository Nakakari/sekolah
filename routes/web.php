<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\SiswaController;
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

//Untuk Landing
Route::get('/', function () {
    return view('Auth.login');
});

//Login Admin dan Pengajar
Auth::routes();

//Login Siswa
Route::get('/siswa', [App\Http\Controllers\Auth\LoginController::class, 'AuthCheckSiswa'])->name('siswa');

//Dashboard
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('pengajar/home', [HomeController::class, 'pengajarHome'])->name('pengajar.home')->middleware('is_pengajar');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::get('/dataadmin', [AdminController::class, 'dataAdmin'])->name('dataadmin')->middleware('is_admin');
Route::post('/upload/admin', [AdminController::class, 'addAdmin'])->middleware('is_admin');
Route::post('/update/admin/{id}', [AdminController::class, 'updateAdmin'])->middleware('is_admin');

//hapus data
Route::get('/hapus/admin/{id}', [AdminController::class, 'hapusAdmin'])->middleware('is_admin');

//Data Sekolah
Route::get('/datasekolah', [AdminController::class, 'dataSekolah'])->name('datasekolah')->middleware('is_admin');
Route::post('/upload/sekolah', [AdminController::class, 'adddataSekolah'])->middleware('is_admin');
Route::post('/update/datasekolah/{id_data_sklh}', [AdminController::class, 'updatedataSekolah'])->middleware('is_admin');

//Pengajar tapi kuasa admin
Route::get('/pengajar', [AdminController::class, 'dataPengajar'])->name('pengajar')->middleware('is_admin');
Route::post('/upload/pengajar', [AdminController::class, 'addPengajar'])->middleware('is_admin');
Route::post('/update/pengajar/{id}', [AdminController::class, 'updatePengajar'])->middleware('is_admin');

//Kuasa pengajar untuk Kelas
Route::get('/datakelas', [PengajarController::class, 'dataKelas'])->name('datakelas')->middleware('is_pengajar');
Route::get('/datasiswa/export/{k_enrol}', [PengajarController::class, 'exportSiswa'])->middleware('is_pengajar');
Route::post('/upload/kelas', [PengajarController::class, 'addKelas'])->middleware('is_pengajar');
Route::post('/hapus/kelas/{id_trx_kelas}', [PengajarController::class, 'hapusKelas'])->middleware('is_pengajar');
Route::post('/edit/kelas/{id_trx_kelas}', [PengajarController::class, 'editKelas'])->middleware('is_pengajar');
Route::get('/detail/siswa/{k_enrol}', [PengajarController::class, 'detailSiswa'])->middleware('is_pengajar');

//Pembelajaran 
Route::get('/pembelajaran', [PengajarController::class, 'pembelajaran'])->name('pembelajaran')->middleware('is_pengajar');
Route::get('/tambah/materi/{k_enrol}', [PengajarController::class, 'tambahMateri'])->middleware('is_pengajar');
Route::post('/upload/materi', [PengajarController::class, 'uploadMateri'])->middleware('is_pengajar');
Route::get('/soal/export/{kode_soal}', [PengajarController::class, 'exportSoal'])->middleware('is_pengajar');
Route::post('/update/materi/{id_materi}', [PengajarController::class, 'updateMateri'])->middleware('is_pengajar');
Route::get('/detail/soal/{kode_soal}', [PengajarController::class, 'detailSoal'])->middleware('is_pengajar');

//Siswa
Route::get('/pembelajaranku', [SiswaController::class, 'pembelajaranku'])->name('pembelajaran')->middleware('is_siswa');
Route::get('/masuk/materi/{k_enrol}', [SiswaController::class, 'masukmateri'])->name('masukmateri')->middleware('is_siswa');
