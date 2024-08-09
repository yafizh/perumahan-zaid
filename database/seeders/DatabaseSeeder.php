<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Direktur;
use App\Models\Pengguna;
use App\Models\Rumah;
use App\Models\RumahPelanggan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Pengguna::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1'),
            'status' => 'Admin'
        ]);

        // Admin::create([
        //     'id_pengguna' => 1,
        //     'nama' => 'Tidier',
        //     'email' => 'admin@example.com',
        // ]);

        // Pengguna::create([
        //     'username' => '3326160608070197',
        //     'email' => 'direktur@example.com',
        //     'password' => bcrypt('1'),
        //     'status' => 'Direktur'
        // ]);

        // Direktur::create([
        //     'id_pengguna'   => 2,
        //     'nik'           => '3326160608070197',
        //     'nama'          => 'Direktur',
        //     'email'         => 'direktur@example.com',
        //     'jenis_kelamin' => 'Laki - Laki',
        //     'tempat_lahir'  => 'Martapura',
        //     'tanggal_lahir' => '2000-01-01',
        //     'nomor_telepon' => '',
        //     'foto'          => ''
        // ]);

        // $this->call(BlokPerumahanSeeder::class);
        // $this->call(RumahSeeder::class);
        // $this->call(PelangganSeeder::class);
    }
}
