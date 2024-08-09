<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use App\Models\KeluhanPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeluhanPelangganController extends Controller
{
    public function index()
    {
        $keluhan_pelanggan = KeluhanPelanggan::where('id_pelanggan', Auth::user()->pelanggan->id)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($item) {
                $tanggal = new Carbon($item->tanggal);
                $item->tanggal_terformat = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
                return $item;
            });
        return view('dashboard.pelanggan.halaman.keluhan_pelanggan.index', [
            "keluhan_pelanggan" => $keluhan_pelanggan
        ]);
    }

    public function create()
    {
        return view('dashboard.pelanggan.halaman.keluhan_pelanggan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->file('foto'))
            $data['foto'] = $request->file('foto')->store('keluhan_pelanggan');

        $data['id_pelanggan'] = Auth::user()->pelanggan->id;
        $data['tanggal'] = new Carbon();
        KeluhanPelanggan::create($data);

        return redirect('/pelanggan/keluhan-pelanggan');
    }
}
