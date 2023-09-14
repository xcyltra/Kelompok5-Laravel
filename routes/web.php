<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SkalaNilaiController;
use App\Http\Controllers\PenilaianKerjaController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('AdminLTE/dashboard', [
        "title" => "Dashboard"
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/penilaian-kerja', [PenilaianKerjaController::class, 'index'])->name('penilaianKerja.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/data-jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('/data-jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-divisi', [DivisiController::class, 'index'])->name('divisi.index');
    Route::get('/data-divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/data-divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-skala-nilai', [SkalaNilaiController::class, 'index'])->name('skalaNilai.index');
    Route::get('/data-skala-nilai/create', [SkalaNilaiController::class, 'create'])->name('skalaNilai.create');
    Route::post('/data-skala-nilai/store', [SkalaNilaiController::class, 'store'])->name('skalaNilai.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/data-kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/data-kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
});

require __DIR__.'/auth.php';
