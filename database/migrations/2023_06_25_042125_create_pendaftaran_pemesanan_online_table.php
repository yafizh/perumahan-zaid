<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_pemesanan_online', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna');
            $table->foreignId('id_rumah');
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_beli');
            $table->date('tanggal_verifikasi')->nullable();
            $table->unsignedBigInteger('nominal');
            $table->string('foto');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pemesanan_online');
    }
};
