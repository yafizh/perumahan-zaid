<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rumah_pelanggan');
            $table->date('tanggal');
            $table->unsignedBigInteger('nominal');
            $table->string('foto');
            $table->date('tanggal_beli');
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pemesanan');
    }
};
