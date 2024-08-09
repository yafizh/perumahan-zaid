<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use App\Models\Promo;
use App\Models\PromoRumah;
use App\Models\Rumah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoRumahController extends Controller
{
    public function index(Promo $promo)
    {
        $tanggal_mulai = new Carbon($promo->tanggal_mulai);
        $tanggal_selesai = new Carbon($promo->tanggal_selesai);

        $promo->tanggal_mulai = $tanggal_mulai->day . ' ' . $tanggal_mulai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_mulai->year;
        $promo->tanggal_selesai = $tanggal_selesai->day . ' ' . $tanggal_selesai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_selesai->year;
        return view('dashboard.admin.halaman.perumahan.promo.rumah.index', [
            'promo' => $promo,
            'rumah' => $promo->rumah
        ]);
    }

    public function create(Promo $promo)
    {
        $tanggal_mulai = new Carbon($promo->tanggal_mulai);
        $tanggal_selesai = new Carbon($promo->tanggal_selesai);

        $promo->tanggal_mulai = $tanggal_mulai->day . ' ' . $tanggal_mulai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_mulai->year;
        $promo->tanggal_selesai = $tanggal_selesai->day . ' ' . $tanggal_selesai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_selesai->year;
        
        $blok_perumahan = BlokPerumahan::orderBy('urutan')->get();
        $rumah = [];
        foreach ($blok_perumahan as $value) {
            $rumah[$value->id] = Rumah::where('id_blok_perumahan', $value->id)->whereDoesntHave('promo', function ($q) use ($promo) {
                $q->where('id_promo', $promo->id);
            })->get();
        }

        return view('dashboard.admin.halaman.perumahan.promo.rumah.create', [
            'promo' => $promo,
            "blok_perumahan" => $blok_perumahan,
            'rumah' => $rumah
        ]);
    }

    public function store(Request $request, Promo $promo)
    {
        $data = $request->validate([
            'id_rumah' => 'required',
        ]);

        PromoRumah::create([
            'id_rumah' => $data['id_rumah'],
            'id_promo' => $promo->id
        ]);

        return redirect('/admin/promo/' . $promo->id . '/rumah');
    }

    public function destroy(Promo $promo, Rumah $rumah)
    {
        PromoRumah::where('id_promo', $promo->id)->where('id_rumah', $rumah->id)->delete();
        return redirect('/admin/promo/' . $promo->id . '/rumah');
    }
}
