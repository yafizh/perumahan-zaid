<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RumahController extends Controller
{
    public function index()
    {
        $rumah_pelanggan = Auth::user()->pelanggan->rumahPelanggan;

        $rumah_pelanggan = $rumah_pelanggan->map(function ($item) {
            $pembayaran = $item->pembayaran->filter(fn ($item) => $item->status == 3)->sum('nominal');
            if ($item->pembayaranUangMuka)
                $item->sisa_pembayaran = $item->harga_penjualan - $item->pembayaranUangMuka->nominal - $pembayaran;

            return $item;
        });


        return view('dashboard.pelanggan.halaman.rumah.index', [
            'rumah_pelanggan' => $rumah_pelanggan
        ]);
    }
}
