<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\BahanbakuController;
use App\Models\Pegawai;
use App\Http\Controllers\BahanpenolongController;
use App\Http\Controllers\BiayalainnyaController;
use App\Http\Controllers\PembayaranController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboardbootstrap', function () {
    return view('dashboardbootstrap');
})->middleware(['auth'])->name('dashboardbootstrap');

// route coa
// Route::get('/coa', [App\Http\Controllers\CoaController::class, 'index']);
// untuk master data coa
// jika ingin menambahkan routes baru selain default resource di tambah di awal
// sebelum route resource
Route::get('coa/tabel', [App\Http\Controllers\CoaController::class, 'tabel'])->middleware(['auth']);
Route::get('coa/fetchcoa', [App\Http\Controllers\CoaController::class, 'fetchcoa'])->middleware(['auth']);
Route::get('coa/fetchAll', [App\Http\Controllers\CoaController::class, 'fetchAll'])->middleware(['auth']);
Route::get('coa/edit/{id}', [App\Http\Controllers\CoaController::class, 'edit'])->middleware(['auth']);
Route::get('coa/destroy/{id}', [App\Http\Controllers\CoaController::class, 'destroy'])->middleware(['auth']);
Route::resource('coa', CoaController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // contoh form
    Route::get('contohform/fetchAll', [App\Http\Controllers\ContohformController::class, 'fetchAll'])->middleware(['auth']);
    Route::get('contohform/fetchcontohform', [App\Http\Controllers\ContohformController::class, 'fetchcontohform'])->middleware(['auth']);
    Route::get('contohform/edit/{id}', [App\Http\Controllers\ContohformController::class, 'edit'])->middleware(['auth']);
    Route::get('contohform/destroy/{id}', [App\Http\Controllers\ContohformController::class, 'destroy'])->middleware(['auth']);
    Route::resource('contohform', App\Http\Controllers\ContohformController::class)->middleware(['auth']);
    // route ke master data perusahaan
    Route::resource('/perusahaan', PerusahaanController::class)->middleware(['auth']);
    Route::get('/perusahaan/destroy/{id}', [App\Http\Controllers\PerusahaanController::class, 'destroy'])->middleware(['auth']);

    Route::resource('/pegawai', PegawaiController::class)->middleware(['auth']);
    Route::get('/pegawai/destroy/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->middleware(['auth']);

    Route::resource('/pekerjaan', PekerjaanController::class)->middleware(['auth']);
    Route::get('/pekerjaan/destroy/{id}', [App\Http\Controllers\PekerjaanController::class, 'destroy'])->middleware(['auth']);

    Route::resource('/bahanbaku', BahanbakuController::class)->middleware(['auth']);
    Route::get('/bahanbaku/destroy/{id}', [App\Http\Controllers\BahanbakuController::class, 'destroy'])->middleware(['auth']);

    // route ke master data perusahaan

    Route::resource('/bahanpenolong', BahanpenolongController::class)->middleware(['auth']);
    Route::get('/bahanpenolong/destroy/{id}', [App\Http\Controllers\BahanpenolongController::class, 'destroy'])->middleware(['auth']);


    Route::resource('/biayalainnya', BiayalainnyaController::class)->middleware(['auth']);
    Route::get('/biayalainnya/destroy/{id}', [App\Http\Controllers\BiayalainnyaController::class, 'destroy'])->middleware(['auth']);

    Route::resource('/pembayaran', PembayaranController::class)->middleware(['auth']);
    Route::get('/pembayaran/destroy/{id}', [App\Http\Controllers\PembayaranController::class, 'destroy'])->middleware(['auth']);
});

require __DIR__ . '/auth.php';
