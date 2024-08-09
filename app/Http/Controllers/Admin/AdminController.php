<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.halaman.pengguna.admin.index', [
            'admin' => Admin::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.halaman.pengguna.admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:pengguna,username',
            'nama' => 'required',
            'email' => 'required|unique:pengguna,email',
            'kata_sandi' => 'required'
        ], [
            'username.unique' => 'username ' . $request->username . ' telah terdaftar. silakan pilih username lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        $id_pengguna = Pengguna::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['kata_sandi']),
        ])->id;

        Admin::create([
            'id_pengguna' => $id_pengguna,
            'nama' => $data['nama'],
            'email' => $data['email'],
        ]);

        return redirect('/admin/admin');
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.admin.halaman.pengguna.admin.edit', [
            'admin' => $admin
        ]);
    }


    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'username' => [
                'required',
                Rule::unique('pengguna')->ignore($admin->pengguna->id)
            ],
            'nama' => 'required',
            'email' => [
                'required',
                Rule::unique('pengguna')->ignore($admin->pengguna->id)
            ],
        ], [
            'username.unique' => 'username ' . $request->username . ' telah terdaftar. silakan pilih username lain.',
            'email.unique' => 'email ' . $request->email . ' telah terdaftar. silakan pilih email lain.',
        ]);

        Pengguna::where('id', $admin->pengguna->id)->update([
            'username' => $data['username'],
            'email' => $data['email'],
        ]);

        Admin::where('id', $admin->id)->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
        ]);

        return redirect('/admin/admin');
    }

    public function destroy(Admin $admin)
    {
        Pengguna::destroy($admin->pengguna->id);
        Admin::destroy($admin->id);
        return redirect('/admin/admin');
    }
}
