<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranPemesanan;
use App\Models\PendaftaranPemesananOnline;
use App\Models\Rumah;
use App\Models\RumahPelanggan;
use Carbon\Carbon;

class PengajuanPemesananController extends Controller
{
    public function index()
    {
        $pendaftaranPemesanan = PendaftaranPemesananOnline::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pendaftaranPemesananTerverifikasi = PendaftaranPemesananOnline::where('status', 2)
            ->orWhere('status', 3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pendaftaranPemesanan = $pendaftaranPemesanan->merge($pendaftaranPemesananTerverifikasi);
        return view('dashboard.staf.halaman.penjualan_perumahan.pendaftaran_pesanan_online.index', [
            'pendaftaran_pemesanan' => $pendaftaranPemesanan,
        ]);
    }

    public function show(PendaftaranPemesananOnline $pengajuanPemesanan)
    {
        return view('dashboard.staf.halaman.penjualan_perumahan.pendaftaran_pesanan_online.show', [
            'rumah' => $pengajuanPemesanan->rumah,
            'pelanggan' => $pengajuanPemesanan->pengguna->pelanggan,
            'pengajuanPemesanan' => $pengajuanPemesanan
        ]);
    }

    public function terima(PendaftaranPemesananOnline $pengajuanPemesanan)
    {
        $pengajuanPemesanan->update([
            'tanggal_verifikasi' => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'status' => 3
        ]);

        $hargaPenjualan = $pengajuanPemesanan->rumah->harga - $pengajuanPemesanan->rumah->promo->map(function ($promo) {
            return $promo->pengurangan_harga;
        })->sum();

        $idRumahPelanggan = RumahPelanggan::create([
            'id_rumah' => $pengajuanPemesanan->id_rumah,
            'id_pelanggan' => $pengajuanPemesanan->pengguna->pelanggan->id,
            'harga_penjualan' => $hargaPenjualan,
        ])->id;
        PendaftaranPemesanan::create([
            'id_rumah_pelanggan'    => $idRumahPelanggan,
            'tanggal'               => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'tanggal_beli'          => $pengajuanPemesanan->tanggal_beli,
            'nominal'               => $pengajuanPemesanan->nominal,
            'foto'                  => $pengajuanPemesanan->foto
        ]);
        Rumah::find($pengajuanPemesanan->id_rumah)->update(['status_ketersediaan' => 2]);

        return redirect('/staf/pengajuan-pemesanan/' . $pengajuanPemesanan->id);
    }

    public function tolak(PendaftaranPemesananOnline $pengajuanPemesanan)
    {
        $pengajuanPemesanan->update([
            'tanggal_verifikasi' => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'status' => 2
        ]);

        return redirect('/staf/pengajuan-pemesanan/' . $pengajuanPemesanan->id);
    }
}
