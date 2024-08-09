<?php

namespace App\Http\Controllers;

use App\Models\KeluhanPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $keluhan_pelanggan = KeluhanPelanggan::orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($item) {
                $tanggal = new Carbon($item->tanggal);
                $item->tanggal_terformat = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
                return $item;
            });
        return view('dashboard.admin.halaman.dashboard.index', [
            "keluhan_pelanggan" => $keluhan_pelanggan
        ]);
    }

    public function staf()
    {
        $keluhan_pelanggan = KeluhanPelanggan::orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($item) {
                $tanggal = new Carbon($item->tanggal);
                $item->tanggal_terformat = $tanggal->day . ' ' . $tanggal->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal->year;
                return $item;
            });
        return view('dashboard.staf.halaman.dashboard.index', [
            "keluhan_pelanggan" => $keluhan_pelanggan
        ]);
    }

    public function pelanggan() {
        return view('dashboard.pelanggan.halaman.dashboard.index');
    }
}
