<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\Controller;
use App\Models\DetailPembayaran;
use App\Models\Pembayaran;
use App\Models\RumahPelanggan;
use Carbon\Carbon;

class PembayaranRumahController extends Controller
{
    public function index()
    {
        $pembayaran = DetailPembayaran::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $permbayaranTerverifikasi = DetailPembayaran::where('status', '!=', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pembayaran = $pembayaran->merge($permbayaranTerverifikasi);
        return view('dashboard.staf.halaman.penjualan_perumahan.pembayaran_rumah.index', [
            'pembayaran' => $pembayaran,
        ]);
    }

    public function show(DetailPembayaran $detailPembayaran)
    {
        return view('dashboard.staf.halaman.penjualan_perumahan.pembayaran_rumah.show', [
            'rumah' => $detailPembayaran->pembayaran->rumahPelanggan->rumah,
            'pelanggan' => $detailPembayaran->pembayaran->rumahPelanggan->pelanggan,
            'detail_pembayaran' => $detailPembayaran
        ]);
    }

    public function terima(DetailPembayaran $detailPembayaran)
    {

        $pembayaran = Pembayaran::find($detailPembayaran->id_pembayaran);
        $pembayaran->update(['status' => 3]);

        $detailPembayaran->update([
            'tanggal_verifikasi' => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'keterangan'         => '',
            'status'             => 3
        ]);

        $pembayaranBelumDibayar = Pembayaran::where('id_rumah_pelanggan', $pembayaran->id_rumah_pelanggan)->where('status', 1);

        if ($pembayaranBelumDibayar->count() <= 0)
            RumahPelanggan::where('id', $pembayaran->id_rumah_pelanggan)->update(['status_pembayaran' => 2]);

        return redirect('/staf/pembayaran-rumah/' . $detailPembayaran->id);
    }

    public function tolak(DetailPembayaran $detailPembayaran)
    {
        Pembayaran::find($detailPembayaran->id_pembayaran)->update(['status' => 1]);
        $detailPembayaran->update([
            'tanggal_verifikasi'    => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'status'                => 2,
            'keterangan'            => ''
        ]);

        return back();
    }
}
