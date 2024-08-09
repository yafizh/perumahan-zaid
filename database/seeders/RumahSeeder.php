<?php

namespace Database\Seeders;

use App\Models\Rumah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 109; $i++) {
            Rumah::create([
                'id_blok_perumahan' => 1,
                'nomor_rumah' => $i,
                'harga' => 177_000_000,
                'latitude' => '-3.420066',
                'longitude' => '114.841035',
                'alamat' => 'Jl. Al-Kautsar Residence, Cindai Alus, Kec. Martapura, Kabupaten Banjar, Kalimantan Selatan 70714',
                'foto' => '',
                'status_pembangunan' => 1
            ]);
        }
        for ($i = 1; $i <= 107; $i++) {
            Rumah::create([
                'id_blok_perumahan' => 2,
                'nomor_rumah' => $i,
                'harga' => 177_000_000,
                'latitude' => '-3.420066',
                'longitude' => '114.841035',
                'alamat' => 'Jl. Al-Kautsar Residence, Cindai Alus, Kec. Martapura, Kabupaten Banjar, Kalimantan Selatan 70714',
                'foto' => '',
                'status_pembangunan' => 1
            ]);
        }
    }
}
