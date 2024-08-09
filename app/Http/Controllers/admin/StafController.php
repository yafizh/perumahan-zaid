<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Staf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StafController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.halaman.pengguna.staf.index', [
            'staf' => Staf::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.pengguna.staf.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|unique:staf,nik|unique:pengguna,username',
            'nama' => 'required',
            'nomor_telepon' => 'required|unique:staf,nomor_telepon',
            'email' => 'required|unique:staf,email|unique:pengguna,email',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required',
            'kata_sandi' => 'required',
        ], [
            'nik.unique' => 'NIK ' . $request->nik . ' telah terdaftar.',
            'nomor_telepon.unique' => 'nomor telepon ' . $request->nomor_telepon . ' telah terdaftar. silakan pilih nomor telepon lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('staf');

        $id_pengguna = Pengguna::create([
            'username' => $data['nik'],
            'email' => $data['email'],
            'password' => bcrypt($data['kata_sandi']),
            'status' => 'Staf'
        ])->id;

        Staf::create([
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

        return redirect('/admin/staf');
    }

    public function show(Staf $staf)
    {
        $tanggal_lahir = new Carbon($staf->tanggal_lahir);
        $staf->tanggal_lahir = $tanggal_lahir->day . ' ' . $tanggal_lahir->locale('ID')->getTranslatedMonthName()  . ' ' . $tanggal_lahir->year;
        return view('dashboard.admin.halaman.pengguna.staf.show', [
            'staf' => $staf
        ]);
    }

    public function edit(Staf $staf)
    {
        return view('dashboard.admin.halaman.pengguna.staf.edit', [
            'staf' => $staf
        ]);
    }


    public function update(Request $request, Staf $staf)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('staf', 'nik')->ignore($staf->id),
                Rule::unique('pengguna', 'username')->ignore($staf->pengguna->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('staf', 'nomor_telepon')->ignore($staf->id),
            ],
            'email' => [
                'required',
                Rule::unique('staf', 'email')->ignore($staf->id),
                Rule::unique('pengguna', 'email')->ignore($staf->pengguna->id),
            ],
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ], [
            'nik.unique' => 'staf dengan NIK ' . $request->nik . ' telah terdaftar.',
            'nomor_telepon.unique' => 'nomor telepon ' . $request->nomor_telepon . ' telah terdaftar. silakan pilih nomor telepon lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('staf');

        Pengguna::where('id', $staf->pengguna->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Staf::where('id', $staf->id)->update($data);

        return redirect('/admin/staf');
    }

    public function destroy(Staf $staf)
    {
        Pengguna::destroy($staf->pengguna->id);
        Staf::destroy($staf->id);
        return redirect('/admin/staf');
    }
}
