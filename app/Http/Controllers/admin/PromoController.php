<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use App\Models\PromoRumah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promo = Promo::orderBy('tanggal_mulai')->get();
        $promo = $promo->map(function ($item) {
            $tanggal_mulai = new Carbon($item->tanggal_mulai);
            $tanggal_selesai = new Carbon($item->tanggal_selesai);

            $item->tanggal_mulai = $tanggal_mulai->day . ' ' . $tanggal_mulai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_mulai->year;
            $item->tanggal_selesai = $tanggal_selesai->day . ' ' . $tanggal_selesai->locale('ID')->getTranslatedMonthName() . ' ' . $tanggal_selesai->year;

            return $item;
        });
        return view('dashboard.admin.halaman.perumahan.promo.index', [
            "promo" => $promo
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.perumahan.promo.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'pengurangan_harga' =>  [
                'required',
                'regex:/^[0-9].*+$/'
            ]
        ]);

        $data['pengurangan_harga'] = implode('', explode('.', $data['pengurangan_harga']));
        Promo::create($data);

        return redirect('/admin/promo');
    }

    public function show(Promo $promo)
    {
        //
    }

    public function edit(Promo $promo)
    {
        return view('dashboard.admin.halaman.perumahan.promo.edit', [
            'promo' => $promo
        ]);
    }

    public function update(Request $request, Promo $promo)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'pengurangan_harga' =>  [
                'required',
                'regex:/^[0-9].*+$/'
            ]
        ]);

        $data['pengurangan_harga'] = implode('', explode('.', $data['pengurangan_harga']));
        Promo::find($promo->id)->update($data);

        return redirect('/admin/promo');
    }

    public function destroy(Promo $promo)
    {
        PromoRumah::where('id_promo', $promo->id)->delete();
        Promo::destroy($promo->id);
        return redirect('/admin/promo');
    }
}
