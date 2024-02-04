<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/sign-up', [AuthController::class, 'add'])->name('sign-up');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/petugas', [AuthController::class,'login_petugas'])->name('petugas');
Route::post('/authenticate-petugas', [AuthController::class,'authenticate_petugas'])->name('authenticate-petugas');

//Masyarakat Area
Route::group(['middleware' => ['isMasyarakat'], 'prefix' => 'masyarakat'], function(){
    Route::get('/index', [MasyarakatController::class, 'index'])->name('masyarakat-index');
    Route::get('/buat-aduan', [PengaduanController::class, 'create'])->name('buat-aduan');
    Route::post('/kirim-aduan', [PengaduanController::class, 'store'])->name('kirim-aduan');
    Route::get('/aduan-saya', [MasyarakatController::class, 'show'])->name('aduan-saya');
    Route::get('/semua-aduan', [PengaduanController::class, 'index'])->name('semua-aduan');
    Route::get('/detail-aduan/{id}', [PengaduanController::class, 'show'])->name('detail-aduan');
});

//Admin Area
Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin'], function(){
    Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas');
    Route::get('/tambah-petugas', [PetugasController::class, 'create'])->name('tambah-petugas');
    Route::post('/simpan-petugas', [PetugasController::class, 'store'])->name('simpan-petugas');
    Route::get('/edit-petugas/{id}', [PetugasController::class, 'edit'])->name('edit-petugas');
    Route::post('/update-petugas/{id}', [PetugasController::class, 'update'])->name('update-petugas');
    Route::delete('/hapus-petugas/{id}', [PetugasController::class, 'destroy'])->name('hapus-petugas');
    Route::get('pengaduan/export/', [PengaduanController::class, 'export'])->name('export-pengaduan');
    
});

Route::group(['middleware' => ['isPetugas'], 'prefix' => 'petugas'], function(){
    Route::get('/index', [AdminController::class, 'index'])->name('admin-index');
    Route::get('/aduan-masyarakat', [TanggapanController::class, 'index'])->name('aduan-masyarakat');
    Route::get('detail/aduan-masyarakat/{id}', [TanggapanController::class, 'show'])->name('detail-aduan-masyarakat');
    Route::post('/kirim-tanggapan/{id}', [TanggapanController::class,'store'])->name('kirim-tanggapan');
    Route::delete('/hapus-aduan/{id}', [TanggapanController::class, 'destroy'])->name('hapus-aduan');
});
