<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keluhan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan');
            $table->string('judul');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->string('foto')->default('');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluhan_pelanggan');
    }
};
