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
    Route::get('/pegawai/edit/{pegawai}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/update/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/penilaian-kerja', [PenilaianKerjaController::class, 'index'])->name('penilaianKerja.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/data-jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('/data-jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/data-jabatan/edit/{jabatan}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('/data-jabatan/update/{jabatan}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/data-jabatan/delete/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-divisi', [DivisiController::class, 'index'])->name('divisi.index');
    Route::get('/data-divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/data-divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
    Route::get('/data-divisi/edit/{divisi}', [DivisiController::class, 'edit'])->name('divisi.edit');
    Route::put('/data-divisi/update/{divisi}', [DivisiController::class, 'update'])->name('divisi.update');
    Route::delete('/data-divisi/delete/{divisi}', [DivisiController::class, 'destroy'])->name('divisi.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-skala-nilai', [SkalaNilaiController::class, 'index'])->name('skalaNilai.index');
    Route::get('/data-skala-nilai/create', [SkalaNilaiController::class, 'create'])->name('skalaNilai.create');
    Route::post('/data-skala-nilai/store', [SkalaNilaiController::class, 'store'])->name('skalaNilai.store');
    Route::get('/data-skala-nilai/edit/{skalaNilai}', [SkalaNilaiController::class, 'edit'])->name('skalaNilai.edit');
    Route::put('/data-skala-nilai/update/{skalaNilai}', [SkalaNilaiController::class, 'update'])->name('skalaNilai.update');
    Route::delete('/data-skala-nilai/delete/{skalaNilai}', [SkalaNilaiController::class, 'destroy'])->name('skalaNilai.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/data-kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/data-kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/data-kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/data-kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/data-kategori/delete/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

require __DIR__.'/auth.php';
