<?php
// USE ADMIN
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DaftarAkunController;
use App\Http\Controllers\DataPemasukanController;
use App\Http\Controllers\DataPengeluaranController;
use App\Http\Controllers\DataHutangController;
use App\Http\Controllers\DataPiutangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\NeracaSaldoController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\PerubahanModalController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\RiwayatPembatalanController;

// USE PEMILIK
use App\Http\Controllers\DataTransaksiPemilikController;
use App\Http\Controllers\JurnalUmumPemilikController;
use App\Http\Controllers\BukuBesarPemilikController;
use App\Http\Controllers\NeracaSaldoPemilikController;
use App\Http\Controllers\LabaRugiPemilikController;
use App\Http\Controllers\PerubahanModalPemilikController;
use App\Http\Controllers\NeracaPemilikController;
use App\Http\Controllers\RiwayatPembatalanPemilikController;
use App\Http\Controllers\DashboardController;
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


Route::get('/content', function () {
	return view('admins.pages.content');
})->middleware('SessionAdmins');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('SessionAdmins');






// login
Route::get('/login', function () {
	return view('login');
});

Route::get('/', function () {
	return view('login');
});

Route::post('/login_proses', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);

// end login



// admin
Route::get('/data_user', [DataUserController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_user/tambah', [DataUserController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_user/ubah/{id}', [DataUserController::class, 'update'])->middleware('SessionAdmins');

Route::get('/data_daftar_akun', [DaftarAkunController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_daftar_akun/tambah', [DaftarAkunController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_daftar_akun/ubah/{id}', [DaftarAkunController::class, 'update'])->middleware('SessionAdmins');

Route::get('/data_pemasukan', [DataPemasukanController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_pemasukan/tambah', [DataPemasukanController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_pemasukan/ubah/{id}', [DataPemasukanController::class, 'update'])->middleware('SessionAdmins');
Route::post('/data_pemasukan/cari', [DataPemasukanController::class, 'filter'])->middleware('SessionAdmins');
Route::get('/data_pemasukan/batal_trx/{id}', [DataPemasukanController::class, 'destroy'])->middleware('SessionAdmins');



Route::get('/data_pengeluaran', [DataPengeluaranController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_pengeluaran/tambah', [DataPengeluaranController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_pengeluaran/ubah/{id}', [DataPengeluaranController::class, 'update'])->middleware('SessionAdmins');
Route::post('/data_pengeluaran/cari', [DataPengeluaranController::class, 'filter'])->middleware('SessionAdmins');


Route::get('/data_hutang', [DataHutangController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_hutang/tambah', [DataHutangController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_hutang/ubah/{id}', [DataHutangController::class, 'update'])->middleware('SessionAdmins');
Route::post('/data_hutang/cari', [DataHutangController::class, 'filter'])->middleware('SessionAdmins');


Route::get('/data_piutang', [DataPiutangController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_piutang/tambah', [DataPiutangController::class, 'store'])->middleware('SessionAdmins');
Route::post('/data_piutang/ubah/{id}', [DataPiutangController::class, 'update'])->middleware('SessionAdmins');
Route::post('/data_piutang/cari', [DataPiutangController::class, 'filter'])->middleware('SessionAdmins');


Route::get('/data_transaksi', [DataTransaksiController::class, 'index'])->middleware('SessionAdmins');
Route::post('/data_transaksi/generate', [DataTransaksiController::class, 'generate'])->middleware('SessionAdmins');


Route::get('/detail_jurnal_umum', [JurnalUmumController::class, 'index'])->middleware('SessionAdmins');
Route::get('/jurnal_umum/{periode}', [JurnalUmumController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/buku_besar', [BukuBesarController::class, 'index'])->middleware('SessionAdmins');
Route::get('/detail_buku_besar/{periode}', [BukuBesarController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/neraca_saldo', [NeracaSaldoController::class, 'index'])->middleware('SessionAdmins');
Route::get('/detail_neraca_saldo/{periode}', [NeracaSaldoController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/laba_rugi', [LabaRugiController::class, 'index'])->middleware('SessionAdmins');
Route::get('/detail_laba_rugi/{periode}', [LabaRugiController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/perubahan_modal', [PerubahanModalController::class, 'index'])->middleware('SessionAdmins');
Route::get('/detail_perubahan_modal/{periode}', [PerubahanModalController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/neraca', [NeracaController::class, 'index'])->middleware('SessionAdmins');
Route::get('/detail_neraca/{periode}', [NeracaController::class, 'detail'])->middleware('SessionAdmins');


Route::get('/cari_riwayat_pembatalan', [RiwayatPembatalanController::class, 'formFilter'])->middleware('SessionAdmins');
Route::post('/riwayat_pembatalan', [RiwayatPembatalanController::class, 'filter'])->middleware('SessionAdmins');
// end admin 





// pemilik
Route::get('/dashboard_pemilik', function () {
	return view('pemilik.pages.dashboard_pemilik');
})->middleware('SessionPemilik');

Route::get('/data_transaksi_pemilik', [DataTransaksiPemilikController::class, 'index'])->middleware('SessionPemilik');
Route::post('/data_transaksi_pemilik/generate_pemilik', [DataTransaksiPemilikController::class, 'store'])->middleware('SessionPemilik');


Route::get('/jurnal_umum_pemilik', [JurnalUmumController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_jurnal_umum_pemilik/{periode}', [JurnalUmumController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/buku_besar_pemilik', [BukuBesarController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_buku_besar_pemilik/{periode}', [BukuBesarController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/neraca_saldo_pemilik', [NeracaSaldoController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_neraca_saldo_pemilik/{periode}', [NeracaSaldoController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/laba_rugi_pemilik', [LabaRugiController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_laba_rugi_pemilik/{periode}', [LabaRugiController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/perubahan_modal_pemilik', [PerubahanModalController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_perubahan_modal_pemilik/{periode}', [PerubahanModalController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/neraca_pemilik', [NeracaController::class, 'index'])->middleware('SessionPemilik');
Route::get('/detail_neraca_pemilik/{periode}', [NeracaController::class, 'detail'])->middleware('SessionPemilik');


Route::get('/cari_riwayat_pembatalan_pemilik', [RiwayatPembatalanController::class, 'formFilter'])->middleware('SessionPemilik');
Route::post('/riwayat_pembatalan_pemilik', [RiwayatPembatalanController::class, 'filter'])->middleware('SessionPemilik');