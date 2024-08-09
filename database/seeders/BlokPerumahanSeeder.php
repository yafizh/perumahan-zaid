<?php

namespace Database\Seeders;

use App\Models\BlokPerumahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlokPerumahanSeeder extends Seeder
{
    public function run(): void
    {
        BlokPerumahan::create([
            'nama' => 'Blok A',
            'nomor_awal_rumah' => 1,
            'nomor_akhir_rumah' => 109,
            'urutan' => 1
        ]);
        BlokPerumahan::create([
            'nama' => 'Blok B',
            'nomor_awal_rumah' => 1,
            'nomor_akhir_rumah' => 107,
            'urutan' => 2
        ]);
    }
}
