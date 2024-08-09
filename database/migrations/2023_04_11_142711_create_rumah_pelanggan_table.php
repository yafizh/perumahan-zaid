<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rumah_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rumah');
            $table->foreignId('id_pelanggan');
            $table->unsignedBigInteger('harga_penjualan');
            $table->unsignedTinyInteger('jenis_pembayaran')->nullable();
            $table->unsignedTinyInteger('status_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rumah_pelanggan');
    }
};
