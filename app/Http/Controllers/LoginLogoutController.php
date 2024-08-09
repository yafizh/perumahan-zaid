<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\PendaftaranPelanggan;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class LoginLogoutController extends Controller
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

    public function index()
    {
        return view('autentikasi.index');
    }

    public function pendaftaranPelanggan()
    {
        return view('autentikasi.pendaftaran-pelanggan');
    }

    public function storePendaftaranPelanggan(Request $request)
    {
        $data = $request->validate([
            'nik'                   => 'required|unique:pelanggan,nik',
            'nama'                  => 'required',
            'nomor_telepon'         => 'required',
            'password'              => 'required',
            'konfirmasi_password'   => 'required',
        ], [
            'nik.unique' => 'NIK telah terdaftar'
        ]);


        if (!($data['password'] == $data['konfirmasi_password']))
            throw ValidationException::withMessages(['password' => 'Password Tidak Sama']);

        $data['kode_otp'] = strtoupper(substr(uniqid(), 7, 6));
        $response = Http::timeout(6)->post($this->zenzivaEnpoint, [
            'userkey'   => $this->zenzivaUserKey,
            'passkey'   => $this->zenzivaApiKey,
            'to'        => $data['nomor_telepon'],
            'message'   => "PT. Karya Putra Bersaudara \nKode OTP anda adalah " . $data['kode_otp']
        ]);
        $data['password'] = bcrypt($data['password']);
        $id = PendaftaranPelanggan::create($data)->id;

        return redirect("/verifikasi-pendaftaran-pelanggan?id_pendaftaran_pelanggan={$id}");
    }

    public function verifikasiPendaftaranPelanggan()
    {
        return view('autentikasi.verifikasi-pendaftaran-pelanggan');
    }

    public function storeVerifikasiPendaftaranPelanggan(Request $request)
    {
        $data = $request->validate([
            'id_pendaftaran_pelanggan' => 'required',
            'kode_otp' => 'required',
        ]);

        $pendaftaranPelanggan = PendaftaranPelanggan::find($data['id_pendaftaran_pelanggan']);

        if (!($pendaftaranPelanggan->kode_otp == $data['kode_otp']))
            throw ValidationException::withMessages(['kode_otp' => 'Kode OTP Invalid']);

        $pendaftaranPelanggan->update(['status' => 2]);
        $idPengguna = Pengguna::create([
            'username' => $pendaftaranPelanggan['nik'],
            'password' => $pendaftaranPelanggan['password'],
            'status'   => 'Pelanggan'
        ])->id;

        Pelanggan::create([
            'id_pengguna'               => $idPengguna,
            'id_pendaftaran_pelanggan'  => $pendaftaranPelanggan['id'],
            'nik'                       => $pendaftaranPelanggan['nik'],
            'nama'                      => $pendaftaranPelanggan['nama'],
            'nomor_telepon'             => $pendaftaranPelanggan['nomor_telepon'],
        ]);

        return redirect('/login')->with('pendaftaran', 'Pendaftaran berhasil, silakan login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (
            Auth::attempt($data) ||
            Auth::attempt([
                'email'     => $data['username'],
                'password'  => $data['password']
            ])
        ) {
            $request->session()->regenerate();

            if (Auth::user()->status === 'Admin')
                return redirect()->intended('/admin');
            elseif (Auth::user()->status === 'Staf')
                return redirect()->intended('/staf');
            elseif (Auth::user()->status === 'Pelanggan')
                return redirect()->intended('/pelanggan');
            elseif (Auth::user()->status === 'Direktur')
                return redirect()->intended('/direktur/laporan/rumah');
        }

        return back()->with('auth', 'Username atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
