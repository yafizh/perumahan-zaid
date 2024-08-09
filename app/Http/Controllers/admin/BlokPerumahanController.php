<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlokPerumahan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlokPerumahanController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.halaman.perumahan.blok_perumahan.index', [
            "blok_perumahan" => BlokPerumahan::orderBy('urutan')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.perumahan.blok_perumahan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|unique:blok_perumahan,nama',
            'nomor_awal_rumah' => 'required',
            'nomor_akhir_rumah' => 'required',
            'urutan' => 'required'
        ], [
            'nama.unique' => 'nama blok perumahan harus unik dan tidak boleh sama. silakan pilih nama lain untuk blok perumahan.'
        ]);

        BlokPerumahan::create($data);

        return redirect('/admin/blok-perumahan');
    }

    public function show(BlokPerumahan $blokPerumahan)
    {
        //
    }

    public function edit(BlokPerumahan $blokPerumahan)
    {
        return view('dashboard.admin.halaman.perumahan.blok_perumahan.edit', [
            'blok_perumahan' => $blokPerumahan
        ]);
    }

    public function update(Request $request, BlokPerumahan $blokPerumahan)
    {
        $data = $request->validate([
            'nama' => [
                'required',
                Rule::unique('blok_perumahan')->ignore($blokPerumahan->id)
            ],
            'nomor_awal_rumah' => 'required',
            'nomor_akhir_rumah' => 'required',
            'urutan' => 'required'
        ], [
            'nama.unique' => 'nama blok perumahan harus unik dan tidak boleh sama. silakan pilih nama lain untuk blok perumahan.'
        ]);

        BlokPerumahan::where('id', $blokPerumahan->id)->update($data);

        return redirect('/admin/blok-perumahan');
    }

    public function destroy(BlokPerumahan $blokPerumahan)
    {
        BlokPerumahan::destroy($blokPerumahan->id);
        return redirect('/admin/blok-perumahan');
    }
}
