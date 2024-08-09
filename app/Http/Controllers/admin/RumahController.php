<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\Rumah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RumahController extends Controller
{
    public function index()
    {
        if (BlokPerumahan::all()->count()) {
            $blok = request()->get('blok') ?? BlokPerumahan::orderBy('urutan')->first()->urutan;
            return view('dashboard.admin.halaman.perumahan.rumah.index', [
                "semua_blok_perumahan" => BlokPerumahan::orderBy('urutan')->get(),
                "blok" => $blok,
                "blok_perumahan_terpilih" => BlokPerumahan::where('urutan', $blok)->first(),
            ]);
        }

        return view('dashboard.admin.halaman.perumahan.rumah.index');
    }

    public function create()
    {
        return view('dashboard.admin.halaman.perumahan.rumah.create', [
            'blok_perumahan' => BlokPerumahan::orderBy('urutan')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_blok_perumahan' => 'required',
            'nomor_rumah' => 'required|unique:rumah,nomor_rumah',
            'harga' => [
                'required',
                'regex:/[0-9]*.|[0-9]*/i'
            ],
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'status_pembangunan' => 'required',
            'foto' => 'required'
        ], [
            'nomor_rumah.unique' => 'nomor rumah harus unik dan tidak boleh sama. silakan pilih nomor rumah lain untuk nomor rumah.',
            'harga.regex' => 'Kolom harga harus berupa angka.'
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('rumah');

        $data['harga'] = implode('', explode('.', $data['harga']));
        Rumah::create($data);
        return redirect('/admin/rumah?blok=' . BlokPerumahan::find($data['id_blok_perumahan'])->urutan);
    }

    public function show(Rumah $rumah)
    {
        $riwayat_pembangunan_rumah = $rumah->riwayatPembangunanRumah->map(function ($item) {
            $tanggal = new Carbon($item->tanggal);
            $item->tanggal_terformat = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
            return $item;
        });
        
        return view('dashboard.admin.halaman.perumahan.rumah.show', [
            'rumah' => $rumah,
            'riwayat_pembangunan_rumah' => $riwayat_pembangunan_rumah
        ]);
    }

    public function edit(Rumah $rumah)
    {
        $rumah['harga'] = number_format($rumah->harga, 0, ',', '.');
        return view('dashboard.admin.halaman.perumahan.rumah.edit', [
            'blok_perumahan' => BlokPerumahan::orderBy('urutan')->get(),
            'rumah' => $rumah
        ]);
    }

    public function update(Request $request, Rumah $rumah)
    {
        $data = $request->validate([
            'id_blok_perumahan' => 'required',
            'nomor_rumah' => [
                'required',
                Rule::unique('rumah')->ignore($rumah->id)
            ],
            'harga' => [
                'required',
                'regex:/[0-9]*.|[0-9]*/i'
            ],
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'status_pembangunan' => 'required',
        ], [
            'nomor_rumah.unique' => 'nomor rumah harus unik dan tidak boleh sama. silakan pilih nomor rumah lain untuk nomor rumah.',
            'harga.regex' => 'Kolom harga harus berupa angka.'
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('rumah');

        $data['harga'] = implode('', explode('.', $data['harga']));
        Rumah::where('id', $rumah->id)->update($data);
        return redirect('/admin/rumah?blok=' . BlokPerumahan::find($data['id_blok_perumahan'])->urutan);
    }

    public function destroy(Rumah $rumah)
    {
        Rumah::destroy($rumah->id);
        return redirect('/admin/rumah?blok=' . $rumah->blokPerumahan->urutan);
    }
}
