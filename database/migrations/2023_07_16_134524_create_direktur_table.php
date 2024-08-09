<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('direktur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('nomor_telepon')->unique();
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direktur');
    }
};
