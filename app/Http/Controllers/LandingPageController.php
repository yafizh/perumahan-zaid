<?php

namespace App\Http\Controllers;

use App\Models\BlokPerumahan;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LandingPageController extends Controller
{
    public function home()
    {
        $unit_tersedia = Rumah::where('status_ketersediaan', 1)->count();
        $unit_terjual = Rumah::where('status_ketersediaan', '>', 1)->count();
        return view('landing.halaman.home', [
            'unit_tersedia' => $unit_tersedia,
            'unit_terjual' => $unit_terjual,
        ]);
    }

    public function unitPerumahan()
    {
        $blok_perumahan = BlokPerumahan::orderBy('urutan')->get();
        $map = [];
        foreach ($blok_perumahan as $value) {
            $blok = Arr::last(explode(' ', $value->nama));
            foreach ($value->rumah as $item) {
                $harga_rumah = $item->harga - $item->promo->map(fn ($promo) => $promo->pengurangan_harga)->sum();
                $map[] = [
                    'nomor'         => $blok . strval($item->nomor_rumah),
                    'status'        => intval($item->status_ketersediaan),
                    'harga'         => number_format($harga_rumah,0,",","."),
                    'sedang_diskon' => $harga_rumah !== $item->harga
                ];
            }
        }
        return view('landing.halaman.unit_perumahan', [
            "map" => $map,
        ]);
    }

    public function tentangKami()
    {
        return view('landing.halaman.tentang_kami');
    }
}
