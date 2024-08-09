<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_kredit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rumah');
            $table->foreignId('id_pelanggan');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_verifikasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kredit');
    }
};
