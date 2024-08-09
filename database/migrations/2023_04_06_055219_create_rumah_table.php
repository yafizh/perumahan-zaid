<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_blok_perumahan');
            $table->unsignedTinyInteger('nomor_rumah');
            $table->unsignedBigInteger('harga');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('alamat');
            $table->string('foto');
            $table->enum('status_ketersediaan', [1, 2, 3])->default(1)->comment('1=Tersedia|2=Dipesan|3=Terjual');
            $table->enum('status_pembangunan', [1, 2, 3])->comment('1=Belum Dibangun|2=Dalam Tahap Pembangunan|3=Selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rumah');
    }
};
