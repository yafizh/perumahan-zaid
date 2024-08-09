<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direktur;
use App\Models\Pengguna;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DirekturController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.halaman.pengguna.direktur.index', [
            'direktur' => Direktur::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.pengguna.direktur.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|unique:direktur,nik|unique:pengguna,username',
            'nama' => 'required',
            'nomor_telepon' => 'required|unique:direktur,nomor_telepon',
            'email' => 'required|unique:direktur,email|unique:pengguna,email',
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
            $data['foto'] = $request->file('foto')->store('direktur');

        $id_pengguna = Pengguna::create([
            'username' => $data['nik'],
            'email' => $data['email'],
            'password' => bcrypt($data['kata_sandi']),
            'status' => 'Direktur'
        ])->id;

        Direktur::create([
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

        return redirect('/admin/direktur');
    }

    public function show(Direktur $direktur)
    {
        $tanggal_lahir = new Carbon($direktur->tanggal_lahir);
        $direktur->tanggal_lahir = $tanggal_lahir->day . ' ' . $tanggal_lahir->locale('ID')->getTranslatedMonthName()  . ' ' . $tanggal_lahir->year;
        return view('dashboard.admin.halaman.pengguna.direktur.show', [
            'direktur' => $direktur
        ]);
    }

    public function edit(Direktur $direktur)
    {
        return view('dashboard.admin.halaman.pengguna.direktur.edit', [
            'direktur' => $direktur
        ]);
    }


    public function update(Request $request, Direktur $direktur)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('direktur', 'nik')->ignore($direktur->id),
                Rule::unique('pengguna', 'username')->ignore($direktur->pengguna->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('direktur', 'nomor_telepon')->ignore($direktur->id),
            ],
            'email' => [
                'required',
                Rule::unique('direktur', 'email')->ignore($direktur->id),
                Rule::unique('pengguna', 'email')->ignore($direktur->pengguna->id),
            ],
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ], [
            'nik.unique' => 'direktur dengan NIK ' . $request->nik . ' telah terdaftar.',
            'nomor_telepon.unique' => 'nomor telepon ' . $request->nomor_telepon . ' telah terdaftar. silakan pilih nomor telepon lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('direktur');

        Pengguna::where('id', $direktur->pengguna->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Direktur::where('id', $direktur->id)->update($data);

        return redirect('/admin/direktur');
    }

    public function destroy(Direktur $direktur)
    {
        Pengguna::destroy($direktur->pengguna->id);
        Direktur::destroy($direktur->id);
        return redirect('/admin/direktur');
    }
}
