<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\PendaftaranPemesananOnline;
use App\Models\Rumah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PemesananRumahController extends Controller
{
    public function index()
    {
        if (is_null(Auth::user()->pelanggan->email)) {
            return redirect('/pelanggan/profil')->with('pemesanan-rumah', 'Lengkapi Profil Untuk Dapat Melakukan Proses Pemesanan!');
        }

        $pendaftaranPemesanan = PendaftaranPemesananOnline::where('id_pengguna', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('dashboard.pelanggan.halaman.pendaftaran_pemesanan.index', ['pendaftaranPemesanan' => $pendaftaranPemesanan]);
    }

    public function create()
    {
        $blok_perumahan = BlokPerumahan::orderBy('urutan')->get();
        $map = [];
        foreach ($blok_perumahan as $value) {
            $blok = Arr::last(explode(' ', $value->nama));
            foreach ($value->rumah as $item) {
                $harga_rumah = $item->harga - $item->promo->map(fn ($promo) => $promo->pengurangan_harga)->sum();
                $map[] = [
                    'nomor'         => $blok . strval($item->nomor_rumah),
                    'status'        => intval($item->status_ketersediaan),
                    'harga'         => number_format($harga_rumah, 0, ",", "."),
                    'sedang_diskon' => $harga_rumah !== $item->harga
                ];
            }
        }

        if (request()->get('nomor_rumah')) {
            $rumah = Rumah::where('nomor_rumah', request()->get('nomor_rumah'))->first();
            $rumah->harga_penjualan = $rumah->harga - $rumah->promo->map(fn ($promo) => $promo->pengurangan_harga)->sum();

            if (Auth::user()->status == 'Admin') {
                return redirect('/admin/rumah/' . $rumah->id);
            }

            if (is_null($rumah)) {
                return redirect('/pelanggan/pemesanan-rumah/create')->with('failed', 'Rumah tidak tersedia');
            }

            if ($rumah->status_ketersediaan != 1) {
                return redirect('/pelanggan/pemesanan-rumah/create')->with('failed', 'Rumah tidak tersedia');
            }
        }


        return view('dashboard.pelanggan.halaman.pendaftaran_pemesanan.create', [
            'pelanggan' => Auth::user()->pelanggan,
            'blok_perumahan' => $blok_perumahan,
            'rumah' => $rumah ?? null,
            'map' => $map,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rumah'      => 'required',
            'tanggal_beli'  => 'required',
            'foto'          => 'file|required|mimes:png,jpg,jpeg'
        ]);

        $data['nominal'] = 500000;

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pendaftaran_pemesanan');

        PendaftaranPemesananOnline::create([
            'id_pengguna'       => Auth::user()->id,
            'id_rumah'          => $data['id_rumah'],
            'tanggal_pemesanan' => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString(),
            'tanggal_beli'      => $data['tanggal_beli'],
            'nominal'           => $data['nominal'],
            'foto'              => $data['foto'],
            'status'            => 1
        ]);

        return redirect('/pelanggan/pemesanan-rumah');
    }
}
