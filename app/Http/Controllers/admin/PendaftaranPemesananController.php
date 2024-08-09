<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\Pelanggan;
use App\Models\PendaftaranPemesanan;
use App\Models\Rumah;
use App\Models\RumahPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendaftaranPemesananController extends Controller
{
    public function index()
    {
        $pendaftaran_pemesanan = PendaftaranPemesanan::select("*")
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('dashboard.admin.halaman.penjualan_perumahan.pendaftaran_pesanan.index', [
            "pendaftaran_pemesanan" => $pendaftaran_pemesanan
        ]);
    }

    public function create()
    {
        $blok_perumahan = BlokPerumahan::orderBy('urutan')->get();
        $rumah = [];
        foreach ($blok_perumahan as $value) {
            $rumah[$value->id] = [];
            foreach ($value->rumah as $item) {
                if ($item->status_ketersediaan == 1) {
                    $rumah[$value->id][] = $item;
                }
            }
        }

        return view('dashboard.admin.halaman.penjualan_perumahan.pendaftaran_pesanan.create', [
            "blok_perumahan" => $blok_perumahan,
            "rumah" => $rumah,
            "pelanggan" => Pelanggan::orderBy('id', 'DESC')->get(),
            "rumah_pelanggan" => $rumah_pelanggan ?? null
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rumah'      => 'required',
            'id_pelanggan'  => 'required',
            'tanggal'       => 'required',
            'tanggal_beli'  => 'required',
            'nominal'       => [
                'required',
                'regex:/^[0-9].*+$/'
            ],
            'foto'          => 'file|required|mimes:png,jpg,jpeg'
        ]);

        $data['nominal'] = implode('', explode('.', $data['nominal']));

        $rumah = Rumah::find($data['id_rumah']);
        $data['harga_penjualan'] = $rumah->harga - $rumah->promo->map(function ($promo) {
            return $promo->pengurangan_harga;
        })->sum();


        $id_rumah_pelanggan = RumahPelanggan::create($data)->id;

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pendaftaran_pemesanan');

        PendaftaranPemesanan::create([
            'id_rumah_pelanggan'    => $id_rumah_pelanggan,
            'tanggal'               => $data['tanggal'],
            'tanggal_beli'          => $data['tanggal_beli'],
            'nominal'               => $data['nominal'],
            'foto'                  => $data['foto'],
        ]);
        Rumah::find($data['id_rumah'])->update(['status_ketersediaan' => 2]);
        return redirect('/admin/pendaftaran-pemesanan');
    }

    public function edit(PendaftaranPemesanan $pendaftaranPemesanan)
    {
        return view('dashboard.admin.halaman.penjualan_perumahan.pendaftaran_pesanan.edit', [
            'pendaftaran_pemesanan' => $pendaftaranPemesanan
        ]);
    }

    public function update(Request $request, PendaftaranPemesanan $pendaftaranPemesanan)
    {
        $data = $request->validate([
            'tanggal'       => 'required',
            'tanggal_beli'  => 'required',
            'nominal'       => [
                'required',
                'regex:/^[0-9].*+$/'
            ],
            'foto'          => 'mimes:png,jpg,jpeg'
        ]);

        $data['nominal'] = implode('', explode('.', $data['nominal']));

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pendaftaran_pemesanan');

        PendaftaranPemesanan::where('id', $pendaftaranPemesanan->id)->update($data);
        return redirect('/admin/pendaftaran-pemesanan');
    }

    public function destroy(PendaftaranPemesanan $pendaftaranPemesanan)
    {
        if ($pendaftaranPemesanan->rumahPelanggan->pembayaranUangMuka) {
            PendaftaranPemesanan::destroy($pendaftaranPemesanan->id);
            return redirect('/admin/pendaftaran-pemesanan');
        }

        Rumah::where('id', $pendaftaranPemesanan->rumahPelanggan->rumah->id)->update([
            'status_ketersediaan' => 1
        ]);
        RumahPelanggan::where('id', $pendaftaranPemesanan->rumahPelanggan->id)->delete();
        PendaftaranPemesanan::destroy($pendaftaranPemesanan->id);
        return redirect('/admin/pendaftaran-pemesanan');
    }
}
