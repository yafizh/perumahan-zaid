<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Pengguna;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.halaman.pengguna.pelanggan.index', [
            'pelanggan' => Pelanggan::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.pengguna.pelanggan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|unique:pelanggan,nik|unique:pengguna,username',
            'nama' => 'required',
            'nomor_telepon' => 'required|unique:pelanggan,nomor_telepon',
            'email' => 'required|unique:pelanggan,email|unique:pengguna,username',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kata_sandi' => 'required',
            'foto' => 'required',
        ], [
            'nik.unique' => 'NIK ' . $request->nik . ' telah terdaftar.',
            'nomor_telepon.unique' => 'nomor telepon ' . $request->nomor_telepon . ' telah terdaftar. silakan pilih nomor telepon lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pelanggan');

        $id_pengguna = Pengguna::create([
            'username' => $data['nik'],
            'email' => $data['email'],
            'password' => bcrypt($data['kata_sandi']),
            'status' => 'Pelanggan'
        ])->id;

        Pelanggan::create([
            'id_pengguna' => $id_pengguna,
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'nomor_telepon' => $data['nomor_telepon'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'foto' => $data['foto'],
        ]);

        return redirect('/admin/pelanggan');
    }

    public function show(Pelanggan $pelanggan)
    {
        $tanggal_lahir = new Carbon($pelanggan->tanggal_lahir);
        $pelanggan->tanggal_lahir = $tanggal_lahir->day . ' ' . $tanggal_lahir->locale('ID')->getTranslatedMonthName()  . ' ' . $tanggal_lahir->year;
        return view('dashboard.admin.halaman.pengguna.pelanggan.show',  [
            'pelanggan' => $pelanggan,
        ]);
    }

    public function rumah(Pelanggan $pelanggan)
    {
        $tanggal_lahir = Carbon::create($pelanggan->tanggal_lahir)->locale('ID');
        $pelanggan->tanggal_lahir = $tanggal_lahir->day . ' ' . $tanggal_lahir->getTranslatedMonthName()  . ' ' . $tanggal_lahir->year;

        return view('dashboard.admin.halaman.pengguna.pelanggan.rumah',  [
            'rumah_pelanggan'   => $pelanggan->rumahPelanggan,
            'pengajuan_kredit'  => $pelanggan->pengajuanKredit(3),
            'pelanggan'         => $pelanggan,
            'hari_ini'          => Carbon::now()->setTimezone('Asia/Kuala_Lumpur')->toDateString()
        ]);
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.admin.halaman.pengguna.pelanggan.edit', [
            'pelanggan' => $pelanggan
        ]);
    }


    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('pelanggan', 'nik')->ignore($pelanggan->id),
                Rule::unique('pengguna', 'username')->ignore($pelanggan->pengguna->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('pelanggan', 'nomor_telepon')->ignore($pelanggan->id),
            ],
            'email' => [
                'required',
                Rule::unique('pelanggan', 'email')->ignore($pelanggan->id),
                Rule::unique('pengguna', 'email')->ignore($pelanggan->pengguna->id),
            ],
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ], [
            'nik.unique' => 'NIK ' . $request->nik . ' telah terdaftar.',
            'nomor_telepon.unique' => 'nomor telepon ' . $request->nomor_telepon . ' telah terdaftar. silakan pilih nomor telepon lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('pelanggan');

        Pengguna::where('id', $pelanggan->pengguna->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Pelanggan::where('id', $pelanggan->id)->update($data);

        return redirect('/admin/pelanggan');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        Pengguna::destroy($pelanggan->pengguna->id);
        Pelanggan::destroy($pelanggan->id);
        return redirect('/admin/pelanggan');
    }
}
