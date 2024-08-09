<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Direktur;
use App\Models\Pelanggan;
use App\Models\Pengguna;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfilController extends Controller
{
    public function profil()
    {
        if (Auth::user()->status == 'Admin')
            return view('dashboard.admin.halaman.profil.index');

        if (Auth::user()->status == 'Staf')
            return view('dashboard.staf.halaman.profil.index');

        if (Auth::user()->status == 'Pelanggan')
            return view('dashboard.pelanggan.halaman.profil.index');

        if (Auth::user()->status == 'Direktur')
            return view('dashboard.direktur.halaman.profil.index');
    }

    public function perbaharuiProfileAdmin(Request $request)
    {
        $data = $request->validate([
            'username' => [
                'required',
                Rule::unique('pengguna')->ignore(auth()->user()->id)
            ],
            'nama' => 'required',
            'email' => [
                'required',
                Rule::unique('pengguna')->ignore(auth()->user()->id)
            ],
        ], [
            'username.unique' => 'username ' . $request->username . ' telah terdaftar. silakan pilih username lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        Pengguna::where('id', auth()->user()->id)->update([
            'username' => $data['username'],
            'email' => $data['email'],
        ]);

        Admin::where('id', auth()->user()->admin->id)->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
        ]);

        return back()->with('berhasil', 'Profil berhasil diperbaharui!');
    }

    public function perbaharuiProfilePelanggan(Request $request)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('pelanggan', 'nik')->ignore(Auth::user()->pelanggan->id),
                Rule::unique('pengguna', 'username')->ignore(Auth::user()->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('pelanggan', 'nomor_telepon')->ignore(Auth::user()->pelanggan->id),
            ],
            'email' => [
                'required',
                Rule::unique('pelanggan', 'email')->ignore(Auth::user()->pelanggan->id),
                Rule::unique('pengguna', 'email')->ignore(Auth::user()->id),
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

        Pengguna::where('id', Auth::user()->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Pelanggan::where('id', Auth::user()->pelanggan->id)->update($data);

        return back()->with('berhasil', 'Profil berhasil diperbaharui!');
    }

    public function perbaharuiProfileStaf(Request $request)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('staf', 'nik')->ignore(Auth::user()->staf->id),
                Rule::unique('pengguna', 'username')->ignore(Auth::user()->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('staf', 'nomor_telepon')->ignore(Auth::user()->staf->id),
            ],
            'email' => [
                'required',
                Rule::unique('staf', 'email')->ignore(Auth::user()->staf->id),
                Rule::unique('pengguna', 'email')->ignore(Auth::user()->id),
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
            $data['foto'] = $request->file('foto')->store('staf');

        Pengguna::where('id', Auth::user()->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Staf::where('id', Auth::user()->staf->id)->update($data);

        return back()->with('berhasil', 'Profil berhasil diperbaharui!');
    }

    public function perbaharuiProfileDirektur(Request $request)
    {
        $data = $request->validate([
            'nik' => [
                'required',
                Rule::unique('direktur', 'nik')->ignore(Auth::user()->direktur->id),
                Rule::unique('pengguna', 'username')->ignore(Auth::user()->id),
            ],
            'nama' => 'required',
            'nomor_telepon' => [
                'required',
                Rule::unique('direktur', 'nomor_telepon')->ignore(Auth::user()->direktur->id),
            ],
            'email' => [
                'required',
                Rule::unique('direktur', 'email')->ignore(Auth::user()->direktur->id),
                Rule::unique('pengguna', 'email')->ignore(Auth::user()->id),
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
            $data['foto'] = $request->file('foto')->store('direktur');

        Pengguna::where('id', Auth::user()->id)->update([
            'username' => $data['nik'],
            'email' => $data['email'],
        ]);

        Direktur::where('id', Auth::user()->direktur->id)->update($data);

        return back()->with('berhasil', 'Profil berhasil diperbaharui!');
    }

    public function gantiPassword(Request $request)
    {
        if (Auth::user()->status == 'Admin')
            return view('dashboard.admin.halaman.profil.ganti_password');

        if (Auth::user()->status == 'Staf')
            return view('dashboard.staf.halaman.profil.ganti_password');

        if (Auth::user()->status == 'Pelanggan')
            return view('dashboard.pelanggan.halaman.profil.ganti_password');

        if (Auth::user()->status == 'Direktur')
            return view('dashboard.direktur.halaman.profil.ganti_password');
    }

    public function perbaharuiPassword(Request $request)
    {
        $data = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password_baru' => 'required',
        ]);

        if (!$this->cekPasswordLama($data['password_lama'])) {
            throw ValidationException::withMessages(['password_lama' => 'Password Lama Salah']);
        }

        if (!$this->cekPasswordBaru($data['password_baru'], $data['konfirmasi_password_baru'])) {
            throw ValidationException::withMessages(['password_baru' => 'Password Baru Tidak Sama']);
        }

        Pengguna::where('id', auth()->user()->id)->update([
            'password' => bcrypt($data['password_baru']),
        ]);

        return back()->with('berhasil', 'Berhasil Ganti Password!');
    }

    public function cekPasswordLama($password_lama)
    {
        return Hash::check($password_lama, auth()->user()->password);
    }

    public function cekPasswordBaru($password1, $password2)
    {
        return $password1 === $password2;
    }
}
