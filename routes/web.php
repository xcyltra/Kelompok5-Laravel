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
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/penilaian-kerja', [PenilaianKerjaController::class, 'index'])->name('penilaianKerja.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-divisi', [DivisiController::class, 'index'])->name('divisi.index');
    Route::get('/data-divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/data-divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-skala-nilai', [SkalaNilaiController::class, 'index'])->name('skalaNilai.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/data-kategori', [KategoriController::class, 'index'])->name('kategori.index');
});

require __DIR__.'/auth.php';
