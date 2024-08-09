<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\PembayaranUangMuka;
use App\Models\Rumah;
use App\Models\RumahPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranUangMukaController extends Controller
{
    public function index()
    {
        $pembayaran_uang_muka = PembayaranUangMuka::orderBy('created_at', 'DESC')->get()->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });

        return view('dashboard.staf.halaman.penjualan_perumahan.pembayaran_uang_muka.index', [
            "pembayaran_uang_muka" => $pembayaran_uang_muka
        ]);
    }

    public function create()
    {
        $blok_perumahan = BlokPerumahan::orderBy('urutan')->get();
        $rumah = [];
        foreach ($blok_perumahan as $value) {
            $rumah[$value->id] = [];
            foreach ($value->rumah as $item) {
                if ($item->status_ketersediaan == 1 || request()->get('id_rumah') == $item->id) {
                    $rumah[$value->id][] = $item;
                }
            }
        }

        if (request()->get('id_rumah')) {
            $id_blok_rumah_pelanggan = Rumah::find(request()->get('id_rumah'))->blokPerumahan->id;
            $id_rumah_pelanggan = Rumah::find(request()->get('id_rumah'))->id;
        }

        return view('dashboard.staf.halaman.penjualan_perumahan.pembayaran_uang_muka.create', [
            "blok_perumahan" => $blok_perumahan,
            "rumah" => $rumah,
            "pelanggan" => Pelanggan::orderBy('id', 'DESC')->get(),
            "id_blok_rumah_pelanggan" => $id_blok_rumah_pelanggan ?? null,
            "id_rumah_pelanggan" => $id_rumah_pelanggan ?? null
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rumah'                  => 'required',
            'id_pelanggan'              => 'required',
            'tanggal'                   => 'required',
            'nominal'                   => [
                'regex:/^[0-9].*+$/'
            ],
            'foto'                      => 'file|mimes:png,jpg,jpeg',
            'jenis_pembayaran'          => 'required',
            'jumlah_cicilan'            => 'required',
            'tanggal_mulai_pembayaran'  => 'required',
        ]);

        $data['nominal']                = implode('', explode('.', $data['nominal']));

        $rumah = Rumah::find($data['id_rumah']);
        $data['harga_penjualan'] = $rumah->harga - $rumah->promo->map(function ($promo) {
            return $promo->pengurangan_harga;
        })->sum();


        if ($data['jenis_pembayaran'] == 1){
            $data['nominal']            = 0;
            $data['status_pembayaran']  = 2;
        }

        if ($data['jenis_pembayaran'] == 2 || $data['jenis_pembayaran'] == 3)
            $data['status_pembayaran'] = 1;

        if ($rumahPelanggan = RumahPelanggan::where('id_rumah', $data['id_rumah'])->first()) {
            $rumahPelanggan->update([
                'jenis_pembayaran'  => $data['jenis_pembayaran'],
                'status_pembayaran' => $data['status_pembayaran'],
            ]);
            $idRumahPelanggan = $rumahPelanggan->id;
        } else
            $idRumahPelanggan = RumahPelanggan::create($data)->id;

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pembayaran-uang-muka');


        if ($data['jenis_pembayaran'] == 2) {
            $tanggalMulaiPembayaran = Carbon::create($data['tanggal_mulai_pembayaran']);

            $hargaAwal = intval($data['harga_penjualan']) - intval($data['nominal']);
            $perBulan = $hargaAwal / intval($data['jumlah_cicilan']);
            if ($data['jumlah_cicilan'] > 1) {
                if (strlen($perBulan) == 8) {
                    $perBulan = (intval($perBulan / 1000000) + 1) * 1000000;
                }
            }
            do {
                Pembayaran::create([
                    'id_rumah_pelanggan'    => $idRumahPelanggan,
                    'tanggal'               => $tanggalMulaiPembayaran->toDateString(),
                    'nominal'               => $perBulan < $hargaAwal ? $perBulan : $hargaAwal,
                ]);

                $tanggalMulaiPembayaran->addMonth();
                $hargaAwal -= intval($perBulan);
            } while ($hargaAwal > 0);
        }

        PembayaranUangMuka::create([
            'id_rumah_pelanggan'    => $idRumahPelanggan,
            'tanggal'               => $data['tanggal'],
            'nominal'               => $data['nominal'],
            'foto'                  => $data['foto'] ?? '',
        ]);
        Rumah::find($data['id_rumah'])->update(['status_ketersediaan' => 3]);
        return redirect('/staf/pembayaran-uang-muka');
    }

    public function edit(PembayaranUangMuka $pembayaranUangMuka)
    {
        return view('dashboard.staf.halaman.penjualan_perumahan.pembayaran_uang_muka.edit', [
            'pembayaran_uang_muka' => $pembayaranUangMuka
        ]);
    }

    public function update(Request $request, PembayaranUangMuka $pembayaranUangMuka)
    {
        $data = $request->validate([
            'tanggal' => 'required',
            'nominal' => [
                'required',
                'regex:/^[0-9].*+$/'
            ],
            'foto' => 'mimes:png,jpg,jpeg'
        ]);

        $data['nominal'] = implode('', explode('.', $data['nominal']));

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pembayaran_uang_muka');

        PembayaranUangMuka::where('id', $pembayaranUangMuka->id)->update($data);
        return redirect('/staf/pembayaran-uang-muka');
    }

    public function destroy(PembayaranUangMuka $pembayaranUangMuka)
    {
        if ($pembayaranUangMuka->rumahPelanggan->pendaftaranPemesanan) {
            Rumah::where('id', $pembayaranUangMuka->rumahPelanggan->rumah->id)->update([
                'status_ketersediaan' => 2
            ]);
            PembayaranUangMuka::destroy($pembayaranUangMuka->id);
            return redirect('/staf/pembayaran-uang-muka');
        }

        Rumah::where('id', $pembayaranUangMuka->rumahPelanggan->rumah->id)->update([
            'status_ketersediaan' => 1
        ]);
        RumahPelanggan::where('id', $pembayaranUangMuka->rumahPelanggan->id)->delete();
        PembayaranUangMuka::destroy($pembayaranUangMuka->id);
        return redirect('/staf/pembayaran-uang-muka');
    }
}
