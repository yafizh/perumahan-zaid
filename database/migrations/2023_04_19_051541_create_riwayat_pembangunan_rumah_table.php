<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_pembangunan_rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rumah');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembangunan_rumah');
    }
};
