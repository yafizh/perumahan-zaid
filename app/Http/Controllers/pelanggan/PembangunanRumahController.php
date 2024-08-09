<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Rumah;

class PembangunanRumahController extends Controller
{
    public function index(Rumah $rumah)
    {
        return view('dashboard.pelanggan.halaman.riwayat.pembangunan_rumah.index', [
            'rumah' => $rumah,
            'riwayatPembangunanRumah' => $rumah->riwayatPembangunanRumah,
        ]);
    }
}
