<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna');
            $table->foreignId('id_pendaftaran_pelaggan')->nullable();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('nomor_telepon')->unique();
            $table->string('email')->unique()->nullable();
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
