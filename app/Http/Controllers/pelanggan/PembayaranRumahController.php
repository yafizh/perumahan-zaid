<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DetailPembayaran;
use App\Models\Pembayaran;
use App\Models\RumahPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranRumahController extends Controller
{
    public function index(RumahPelanggan $rumahPelanggan)
    {
        $idPembayaram = $rumahPelanggan->pembayaran->map(fn($item) => $item->id);
        $detailPembayaran = DetailPembayaran::select("*")
            ->whereIn('id_pembayaran', $idPembayaram)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('dashboard.pelanggan.halaman.riwayat.pembayaran_rumah.index', [
            'hari_ini'          => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'rumah_pelanggan'   => $rumahPelanggan,
            'detail_pembayaran' => $detailPembayaran,
            'rumah'             => $rumahPelanggan->rumah,
        ]);
    }

    public function create(RumahPelanggan $rumahPelanggan)
    {
        return view('dashboard.pelanggan.halaman.riwayat.pembayaran_rumah.create', [
            'pembayaran'        => Pembayaran::find(request()->get('id_pembayaran')),
            'rumahPelanggan'    => $rumahPelanggan
        ]);
    }

    public function store(RumahPelanggan $rumahPelanggan, Request $request)
    {
        $data = $request->validate([
            'id_pembayaran' => 'required',
            'foto'          => 'required'
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pembayaran-rumah-pelanggan');

        Pembayaran::find($data['id_pembayaran'])->update(['status' => 2]);
        DetailPembayaran::create([
            'id_pembayaran'         => $data['id_pembayaran'],
            'foto'                  => $data['foto'],
            'status'                => 1,
            'tanggal_pembayaran'    => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString()
        ]);

        if (!$rumahPelanggan
            ->pembayaran
            ->filter((fn($pembayaran) => in_array($pembayaran->status, [1, 2])))
            ->count()) {
            $rumahPelanggan->update(['status' => 2]);
        }

        return redirect('/pelanggan/' . $rumahPelanggan->id . '/riwayat-pembayaran-rumah');
    }
}
