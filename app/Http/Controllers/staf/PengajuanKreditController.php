<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\Pelanggan;
use App\Models\PengajuanKredit;
use App\Models\Rumah;
use Illuminate\Http\Request;

class PengajuanKreditController extends Controller
{
    public function index()
    {
        $pengajuanKredit = PengajuanKredit::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pengajuanKreditTerverifikasi = PengajuanKredit::where('status', 2)
            ->orWhere('status', 3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $pengajuanKredit = $pengajuanKredit->merge($pengajuanKreditTerverifikasi);
        return view('dashboard.staf.halaman.penjualan_perumahan.pengajuan_kredit.index', [
            'pengajuan_kredit' => $pengajuanKredit,
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

        return view('dashboard.staf.halaman.penjualan_perumahan.pengajuan_kredit.create', [
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
            'tanggal_pengajuan'         => 'required',
        ]);

        PengajuanKredit::create([
            'id_pelanggan'      => $data['id_pelanggan'],
            'id_rumah'          => $data['id_rumah'],
            'tanggal_pengajuan' => $data['tanggal_pengajuan'],
        ]);

        Rumah::find($data['id_rumah'])->update(['status_ketersediaan' => 2]);

        return redirect('/staf/pengajuan-kredit');
    }

    public function show(PengajuanKredit $pengajuanKredit)
    {
        return view('dashboard.staf.halaman.penjualan_perumahan.pengajuan_kredit.show', [
            'pengajuanKredit' => $pengajuanKredit
        ]);
    }

    public function destroy(PengajuanKredit $pengajuanKredit)
    {
        if (!$pengajuanKredit->rumahPelanggan)
            Rumah::find($pengajuanKredit->rumah->id)->update(['status_ketersediaan' => 1]);

        PengajuanKredit::destroy($pengajuanKredit->id);
        return redirect('/staf/pengajuan-kredit');
    }
}
