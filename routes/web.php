<?php

use App\Http\Controllers\admin\AdminController as AdminAdminController;
use App\Http\Controllers\admin\BlokPerumahanController as AdminBlokPerumahanController;
use App\Http\Controllers\admin\PelangganController as AdminPelangganController;
use App\Http\Controllers\admin\RumahController as AdminRumahController;
use App\Http\Controllers\admin\StafController as AdminStafController;
use App\Http\Controllers\admin\DirekturController as AdminDirekturController;
use App\Http\Controllers\admin\PembayaranUangMukaController as AdminPembayaranUangMukaController;
use App\Http\Controllers\admin\PendaftaranPemesananController as AdminPendaftaranPemesananController;
use App\Http\Controllers\admin\PembayaranRumahController as AdminPembayaranRumahController;
use App\Http\Controllers\admin\PengajuanPemesananController as AdminPengajuanPemesananController;
use App\Http\Controllers\admin\RiwayatPembangunanRumahController as AdminRiwayatPembangunanRumahController;
use App\Http\Controllers\admin\PromoController as AdminPromoController;
use App\Http\Controllers\admin\PengajuanKreditController as AdminPengajuanKreditController;
use App\Http\Controllers\admin\PromoRumahController as AdminPromoRumahController;
use App\Http\Controllers\admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\admin\CetakLaporanController as AdminCetakLaporanController;
use App\Http\Controllers\direktur\LaporanController as DirekturLaporanController;
use App\Http\Controllers\direktur\CetakLaporanController as DirekturCetakLaporanController;
use App\Http\Controllers\staf\PelangganController as StafPelangganController;
use App\Http\Controllers\staf\PembayaranUangMukaController as StafPembayaranUangMukaController;
use App\Http\Controllers\staf\PendaftaranPemesananController as StafPendaftaranPemesananController;
use App\Http\Controllers\staf\PembayaranRumahController as StafPembayaranRumahController;
use App\Http\Controllers\staf\PengajuanPemesananController as StafPengajuanPemesananController;
use App\Http\Controllers\staf\PengajuanKreditController as StafPengajuanKreditController;
use App\Http\Controllers\pelanggan\RumahController as PelangganRumahController;
use App\Http\Controllers\pelanggan\KeluhanPelangganController as PelangganKeluhanPelangganController;
use App\Http\Controllers\pelanggan\PembangunanRumahController as PelangganPembangunanRumahController;
use App\Http\Controllers\pelanggan\PembayaranRumahController as PelangganPembayaranRumahController;
use App\Http\Controllers\pelanggan\PemesananRumahController as PelangganPemesananRumahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginLogoutController;
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

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/unit-perumahan', 'unitPerumahan');
    Route::get('/tentang-kami', 'tentangKami');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'admin']);
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil', [ProfilController::class, 'perbaharuiProfileAdmin']);
    Route::get('/ganti-password', [ProfilController::class, 'gantiPassword']);
    Route::put('/ganti-password', [ProfilController::class, 'perbaharuiPassword']);
    Route::resource('/riwayat-pembangunan-rumah', AdminRiwayatPembangunanRumahController::class);
    Route::resource('/pembayaran-uang-muka', AdminPembayaranUangMukaController::class);
    Route::resource('/pendaftaran-pemesanan', AdminPendaftaranPemesananController::class);

    Route::patch('pengajuan-kredit/{pengajuanKredit}/terima', [AdminPengajuanKreditController::class, 'terima']);
    Route::patch('pengajuan-kredit/{pengajuanKredit}/tolak', [AdminPengajuanKreditController::class, 'tolak']);
    Route::resource('/pengajuan-kredit', AdminPengajuanKreditController::class)->except(['edit', 'update']);

    Route::controller(AdminPembayaranRumahController::class)->prefix('/pembayaran-rumah')->group(function () {
        Route::get('/', 'index');
        Route::get('/{detailPembayaran}', 'show');
        Route::patch('/{detailPembayaran}/terima', 'terima');
        Route::patch('/{detailPembayaran}/tolak', 'tolak');
    });

    Route::controller(AdminPengajuanPemesananController::class)->prefix('/pengajuan-pemesanan')->group(function () {
        Route::get('/', 'index');
        Route::get('/{pengajuanPemesanan}', 'show');
        Route::patch('/{pengajuanPemesanan}/terima', 'terima');
        Route::patch('/{pengajuanPemesanan}/tolak', 'tolak');
    });

    Route::resource('/blok-perumahan', AdminBlokPerumahanController::class);
    Route::resource('/rumah', AdminRumahController::class);
    Route::resource('/admin', AdminAdminController::class);
    Route::resource('/staf', AdminStafController::class);
    Route::resource('/direktur', AdminDirekturController::class);

    Route::resource('/promo', AdminPromoController::class);
    Route::resource('/promo/{promo}/rumah', AdminPromoRumahController::class);

    Route::get('/pelanggan/{pelanggan}/rumah', [AdminPelangganController::class, 'rumah']);
    Route::resource('/pelanggan', AdminPelangganController::class);

    Route::prefix('laporan')->controller(AdminLaporanController::class)->group(function () {
        Route::get('/rumah', 'rumah');
        Route::get('/penjualan-rumah', 'penjualanRumah');
        Route::get('/pemesanan-rumah', 'pemesananRumah');
        Route::get('/keluhan-pelanggan', 'keluhanPelanggan');
        Route::get('/progres-pembangunan-rumah', 'progresPembangunanRumah');
        Route::get('/promo', 'promo');
        Route::get('/grafik-penjualan', 'grafikPenjualan');
        Route::get('/grafik-pemesanan', 'grafikPemesanan');
        Route::get('/keuangan-pembayaran-rumah', 'keuanganPembayaranRumah');
        Route::get('/rekap-tagihan-pembayaran-rumah', 'rekapTagihanPembayaranRumah');
    });

    Route::prefix('cetak')->controller(AdminCetakLaporanController::class)->group(function () {
        Route::get('/rumah', 'rumah');
        Route::get('/penjualan-rumah', 'penjualanRumah');
        Route::get('/pemesanan-rumah', 'pemesananRumah');
        Route::get('/keluhan-pelanggan', 'keluhanPelanggan');
        Route::get('/progres-pembangunan-rumah', 'progresPembangunanRumah');
        Route::get('/promo', 'promo');
        Route::get('/grafik-penjualan', 'grafikPenjualan');
        Route::get('/grafik-pemesanan', 'grafikPemesanan');
        Route::get('/keuangan-pembayaran-rumah', 'keuanganPembayaranRumah');
        Route::get('/rekap-tagihan-pembayaran-rumah', 'rekapTagihanPembayaranRumah');
    });
});

Route::prefix('staf')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'staf']);
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil', [ProfilController::class, 'perbaharuiProfileStaf']);
    Route::get('/ganti-password', [ProfilController::class, 'gantiPassword']);
    Route::put('/ganti-password', [ProfilController::class, 'perbaharuiPassword']);

    Route::resource('/pengajuan-kredit', StafPengajuanKreditController::class)->except(['edit', 'update']);

    Route::resource('/pembayaran-uang-muka', StafPembayaranUangMukaController::class);
    Route::resource('/pendaftaran-pemesanan', StafPendaftaranPemesananController::class);
    Route::controller(StafPembayaranRumahController::class)->prefix('/pembayaran-rumah')->group(function () {
        Route::get('/', 'index');
        Route::get('/{detailPembayaran}', 'show');
        Route::patch('/{detailPembayaran}/terima', 'terima');
        Route::patch('/{detailPembayaran}/tolak', 'tolak');
    });

    Route::controller(StafPengajuanPemesananController::class)->prefix('/pengajuan-pemesanan')->group(function () {
        Route::get('/', 'index');
        Route::get('/{pengajuanPemesanan}', 'show');
        Route::patch('/{pengajuanPemesanan}/terima', 'terima');
        Route::patch('/{pengajuanPemesanan}/tolak', 'tolak');
    });

    Route::get('/pelanggan/{pelanggan}/rumah', [StafPelangganController::class, 'rumah']);
    Route::resource('/pelanggan', StafPelangganController::class);
});

Route::prefix('pelanggan')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'pelanggan']);
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil', [ProfilController::class, 'perbaharuiProfilePelanggan']);
    Route::get('/ganti-password', [ProfilController::class, 'gantiPassword']);
    Route::put('/ganti-password', [ProfilController::class, 'perbaharuiPassword']);
    Route::get('/rumah', [PelangganRumahController::class, 'index']);
    Route::resource('/keluhan-pelanggan', PelangganKeluhanPelangganController::class)->only(['index', 'create', 'store']);

    Route::resource('/{rumah}/riwayat-pembangunan-rumah', PelangganPembangunanRumahController::class);
    Route::resource('/{rumahPelanggan}/riwayat-pembayaran-rumah', PelangganPembayaranRumahController::class);

    Route::controller(PelangganPemesananRumahController::class)->group(function () {
        Route::get('/pemesanan-rumah', 'index');
        Route::get('/pemesanan-rumah/create', 'create');
        Route::post('/pemesanan-rumah', 'store');
    });
});

Route::prefix('direktur')->middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil', [ProfilController::class, 'perbaharuiProfileDirektur']);
    Route::get('/ganti-password', [ProfilController::class, 'gantiPassword']);
    Route::put('/ganti-password', [ProfilController::class, 'perbaharuiPassword']);

    Route::prefix('laporan')->controller(DirekturLaporanController::class)->group(function () {
        Route::get('/rumah', 'rumah');
        Route::get('/penjualan-rumah', 'penjualanRumah');
        Route::get('/pemesanan-rumah', 'pemesananRumah');
        Route::get('/keluhan-pelanggan', 'keluhanPelanggan');
        Route::get('/progres-pembangunan-rumah', 'progresPembangunanRumah');
        Route::get('/promo', 'promo');
        Route::get('/grafik-penjualan', 'grafikPenjualan');
        Route::get('/grafik-pemesanan', 'grafikPemesanan');
        Route::get('/keuangan-pembayaran-rumah', 'keuanganPembayaranRumah');
        Route::get('/rekap-tagihan-pembayaran-rumah', 'rekapTagihanPembayaranRumah');
    });

    Route::prefix('cetak')->controller(DirekturCetakLaporanController::class)->group(function () {
        Route::get('/rumah', 'rumah');
        Route::get('/penjualan-rumah', 'penjualanRumah');
        Route::get('/pemesanan-rumah', 'pemesananRumah');
        Route::get('/keluhan-pelanggan', 'keluhanPelanggan');
        Route::get('/progres-pembangunan-rumah', 'progresPembangunanRumah');
        Route::get('/promo', 'promo');
        Route::get('/grafik-penjualan', 'grafikPenjualan');
        Route::get('/grafik-pemesanan', 'grafikPemesanan');
        Route::get('/keuangan-pembayaran-rumah', 'keuanganPembayaranRumah');
        Route::get('/rekap-tagihan-pembayaran-rumah', 'rekapTagihanPembayaranRumah');
    });
});

Route::controller(LoginLogoutController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/pendaftaran-pelanggan', 'pendaftaranPelanggan');
    Route::post('/pendaftaran-pelanggan', 'storePendaftaranPelanggan');
    Route::get('/verifikasi-pendaftaran-pelanggan', 'verifikasiPendaftaranPelanggan');
    Route::post('/verifikasi-pendaftaran-pelanggan', 'storeVerifikasiPendaftaranPelanggan');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});
