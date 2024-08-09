<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPembangunanRumah;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RiwayatPembangunanRumahController extends Controller
{
    private $zenzivaEnpoint;
    private $zenzivaUserKey;
    private $zenzivaApiKey;

    public function __construct()
    {
        $this->zenzivaEnpoint   = config('services.zenziva.endpoint');
        $this->zenzivaUserKey   = config('services.zenziva.userkey');
        $this->zenzivaApiKey    = config('services.zenziva.apikey');
    }

    public function create()
    {
        return view('dashboard.admin.halaman.riwayat_pembangunan_rumah.create', [
            "rumah" => Rumah::find(request()->get('id_rumah'))
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rumah'      => 'required',
            'tanggal'       => 'required',
            'keterangan'    => 'required',
            'foto'          => 'required',
        ]);

        if ($request->hasFile('foto'))
            $data['foto'] = $request->file('foto')->store('riwayat-pembangunan');

        RiwayatPembangunanRumah::create($data);

        $rumah = Rumah::find($data['id_rumah']);

        $rumah->update(['status_pembangunan' => 2]);

        if ($request->get('proses_pembangunan'))
            $rumah->update(['status_pembangunan' => 3]);

        if ($rumah->rumahPelanggan) {
            $response = Http::timeout(6)->post($this->zenzivaEnpoint, [
                'userkey'   => $this->zenzivaUserKey,
                'passkey'   => $this->zenzivaApiKey,
                'to'        => $rumah->rumahPelanggan->pelanggan->nomor_telepon,
                'message'   => $data['keterangan']
            ]);
        }

        return redirect('/admin/rumah/' . $data['id_rumah']);
    }

    public function edit(RiwayatPembangunanRumah $riwayatPembangunanRumah)
    {
        return view('dashboard.admin.halaman.riwayat_pembangunan_rumah.edit', [
            "riwayat_pembangunan_rumah" => $riwayatPembangunanRumah
        ]);
    }

    public function update(Request $request, RiwayatPembangunanRumah $riwayatPembangunanRumah)
    {
        $data = $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        if ($request->hasFile('foto'))
            $data['foto'] = $request->file('foto')->store('riwayat-pembangunan');

        RiwayatPembangunanRumah::where('id', $riwayatPembangunanRumah->id)->update($data);

        return redirect('/admin/rumah/' . $riwayatPembangunanRumah->id_rumah);
    }

    public function destroy(RiwayatPembangunanRumah $riwayatPembangunanRumah)
    {
        RiwayatPembangunanRumah::destroy($riwayatPembangunanRumah->id);
        return redirect('/admin/rumah/' . $riwayatPembangunanRumah->id_rumah);
    }
}
