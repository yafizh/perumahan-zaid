<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembayaran');
            $table->string('foto');
            $table->string('tanggal_pembayaran');
            $table->string('tanggal_verifikasi')->nullable();
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pembayaran');
    }
};
