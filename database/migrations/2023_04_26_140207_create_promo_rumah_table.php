<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promo_rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_promo');
            $table->foreignId('id_rumah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promo_rumah');
    }
};
