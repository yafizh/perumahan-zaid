<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumah';
    protected $guarded = ['id'];

    public function blokPerumahan()
    {
        return $this->belongsTo(BlokPerumahan::class, 'id_blok_perumahan', 'id');
    }

    public function rumahPelanggan()
    {
        return $this->belongsTo(RumahPelanggan::class, 'id', 'id_rumah');
    }

    public function riwayatPembangunanRumah()
    {
        return $this->hasMany(RiwayatPembangunanRumah::class, 'id_rumah', 'id')->orderBy('tanggal', 'DESC');
    }

    public function promo()
    {
        $today = new Carbon();
        return $this->belongsToMany(Promo::class, PromoRumah::class, 'id_rumah', 'id_promo')
            ->where('tanggal_mulai', '<=', $today->toDateString())
            ->where('tanggal_selesai', '>=', $today->toDateString());
    }
}
