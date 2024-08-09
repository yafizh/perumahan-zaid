<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_uang_muka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rumah_pelanggan');
            $table->date('tanggal');
            $table->unsignedBigInteger('nominal')->default(0);
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_uang_muka');
    }
};
