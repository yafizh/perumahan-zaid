<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blok_perumahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->unsignedTinyInteger('nomor_awal_rumah');
            $table->unsignedTinyInteger('nomor_akhir_rumah');
            $table->unsignedTinyInteger('urutan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blok_perumahan');
    }
};
