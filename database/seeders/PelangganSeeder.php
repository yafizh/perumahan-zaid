<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $nik = '123';
        $email = 'pelanggan1@gmail.com';
        Pelanggan::create([
            'id_pengguna' => Pengguna::create([
                'username' => $nik,
                'email' => $email,
                'password' => bcrypt(1),
                'status' => 'Pelanggan'
            ])->id,
            'nik' => $nik,
            'nama' => 'Pelanggan 1',
            'nomor_telepon' => '087866112233',
            'email' => $email,
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Martapura',
            'tanggal_lahir' => '1990-01-01',
            'foto' => '',
        ]);
    }
}
