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
use App\Http\Controllers\PenjualanController;


use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\InfoumkmController;

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

    Route::resource('/pembelian', PembelianController::class)->middleware(['auth']);
    Route::get('/pembelian/destroy/{id}', [App\Http\Controllers\PembelianController::class, 'destroy'])->middleware(['auth']);

    Route::resource('/biayalainnya', BiayalainnyaController::class)->middleware(['auth']);
    Route::get('/biayalainnya/destroy/{id}', [App\Http\Controllers\BiayalainnyaController::class, 'destroy'])->middleware(['auth']);

    // grafik
    Route::get('grafik/viewPenjualanBlnBerjalan', [App\Http\Controllers\GrafikController::class, 'viewPenjualanBlnBerjalan'])->middleware(['auth']);
    Route::get('grafik/viewJmlPenjualan', [App\Http\Controllers\GrafikController::class, 'viewJmlPenjualan'])->middleware(['auth']);
    Route::get('grafik/viewJmlBarangTerjual', [App\Http\Controllers\GrafikController::class, 'viewJmlBarangTerjual'])->middleware(['auth']);
    Route::get('grafik/viewPenjualanSelectOption/{tahun}', [App\Http\Controllers\GrafikController::class, 'viewPenjualanSelectOption'])->middleware(['auth']);
    Route::get('grafik/viewDataPenjualanSelectOption/{tahun}', [App\Http\Controllers\GrafikController::class, 'viewDataPenjualanSelectOption'])->middleware(['auth']);

    // untuk transaksi penjualan
    Route::get('penjualan/barang/{id}', [App\Http\Controllers\PenjualanController::class, 'getDataBarang'])->middleware(['auth']);
    Route::get('penjualan/keranjang', [App\Http\Controllers\PenjualanController::class, 'keranjang'])->middleware(['auth']);
    Route::get('penjualan/destroypenjualandetail/{id}', [App\Http\Controllers\PenjualanController::class, 'destroypenjualandetail'])->middleware(['auth']);
    Route::get('penjualan/barang', [App\Http\Controllers\PenjualanController::class, 'getDataBarangAll'])->middleware(['auth']);
    Route::get('penjualan/jmlbarang', [App\Http\Controllers\PenjualanController::class, 'getJumlahBarang'])->middleware(['auth']);
    Route::get('penjualan/keranjangjson', [App\Http\Controllers\PenjualanController::class, 'keranjangjson'])->middleware(['auth']);
    Route::get('penjualan/checkout', [App\Http\Controllers\PenjualanController::class, 'checkout'])->middleware(['auth']);
    Route::get('penjualan/invoice', [App\Http\Controllers\PenjualanController::class, 'invoice'])->middleware(['auth']);
    Route::get('penjualan/jmlinvoice', [App\Http\Controllers\PenjualanController::class, 'getInvoice'])->middleware(['auth']);
    Route::get('penjualan/status', [App\Http\Controllers\PenjualanController::class, 'viewstatus'])->middleware(['auth']);
    Route::resource('penjualan', PenjualanController::class)->middleware(['auth']);

    // laporan
    Route::get('jurnal/umum', [App\Http\Controllers\JurnalController::class, 'jurnalumum'])->middleware(['auth']);
    Route::get('jurnal/viewdatajurnalumum/{periode}', [App\Http\Controllers\JurnalController::class, 'viewdatajurnalumum'])->middleware(['auth']);
    Route::get('jurnal/bukubesar', [App\Http\Controllers\JurnalController::class, 'bukubesar'])->middleware(['auth']);
    Route::get('jurnal/viewdatabukubesar/{periode}/{akun}', [App\Http\Controllers\JurnalController::class, 'viewdatabukubesar'])->middleware(['auth']);

    // transaksi pembayaran viewkeranjang
    Route::get('pembayaran/viewkeranjang', [App\Http\Controllers\PembayaranController::class, 'viewkeranjang'])->middleware(['auth']);
    Route::get('pembayaran/viewstatus', [App\Http\Controllers\PembayaranController::class, 'viewstatus'])->middleware(['auth']);
    Route::get('pembayaran/viewapprovalstatus', [App\Http\Controllers\PembayaranController::class, 'viewapprovalstatus'])->middleware(['auth']);
    Route::get('pembayaran/approve/{no_transaksi}', [App\Http\Controllers\PembayaranController::class, 'approve'])->middleware(['auth']);
    Route::get('pembayaran/unapprove/{no_transaksi}', [App\Http\Controllers\PembayaranController::class, 'unapprove'])->middleware(['auth']);
    Route::get('pembayaran/viewstatusPG', [App\Http\Controllers\PembayaranController::class, 'viewstatusPG'])->middleware(['auth']);
    Route::resource('pembayaran', PembayaranController::class)->middleware(['auth']);

    // grafik
    Route::get('grafik/viewPenjualanBlnBerjalan', [App\Http\Controllers\GrafikController::class, 'viewPenjualanBlnBerjalan'])->middleware(['auth']);
    Route::get('grafik/viewJmlPenjualan', [App\Http\Controllers\GrafikController::class, 'viewJmlPenjualan'])->middleware(['auth']);
    Route::get('grafik/viewJmlBarangTerjual', [App\Http\Controllers\GrafikController::class, 'viewJmlBarangTerjual'])->middleware(['auth']);
    Route::get('grafik/viewPenjualanSelectOption/{tahun}', [App\Http\Controllers\GrafikController::class, 'viewPenjualanSelectOption'])->middleware(['auth']);
    Route::get('grafik/viewDataPenjualanSelectOption/{tahun}', [App\Http\Controllers\GrafikController::class, 'viewDataPenjualanSelectOption'])->middleware(['auth']);

    // untuk midtrans
    Route::get('midtrans', [App\Http\Controllers\CobaMidtransController::class, 'index'])->middleware(['auth']);
    Route::get('midtrans/status', [App\Http\Controllers\CobaMidtransController::class, 'cekstatus2'])->middleware(['auth']);
    Route::get('midtrans/status2/{id}', [App\Http\Controllers\CobaMidtransController::class, 'cekstatus'])->middleware(['auth']);
    Route::get('midtrans/bayar', [App\Http\Controllers\CobaMidtransController::class, 'bayar'])->middleware(['auth']);
    Route::post('midtrans/proses_bayar', [App\Http\Controllers\CobaMidtransController::class, 'proses_bayar'])->middleware(['auth']);

    // untuk berita
    Route::get('infoumkm', [App\Http\Controllers\InfoumkmController::class, 'index'])->middleware(['auth']);
    Route::get('infoumkkm/galeri', [App\Http\Controllers\InfoumkmController::class, 'getNews'])->middleware(['auth']);
    Route::get('/infoumkm', [App\Http\Controllers\infoumkmController::class, 'getNews']);
});

// untuk berita
Route::get('berita', [App\Http\Controllers\BeritaController::class, 'index'])->middleware(['auth']);
Route::get('berita/galeri', [App\Http\Controllers\BeritaController::class, 'getNews'])->middleware(['auth']);

Route::get('wisatawan', [App\Http\Controllers\BeritaController::class, 'getWisatawan'])->middleware(['auth']);

require __DIR__ . '/auth.php';
