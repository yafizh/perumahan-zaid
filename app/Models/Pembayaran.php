<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $guarded = ['id'];

    public function rumahPelanggan()
    {
        return $this->belongsTo(RumahPelanggan::class, 'id_rumah_pelanggan', 'id');
    }

    public function tanggal()
    {
        $date = Carbon::create($this->tanggal)->locale('ID');
        return $date->day . " " . $date->getTranslatedMonthName() . " " . $date->year;
    }

    public function detailPembayaran()
    {
        return $this->hasMany(DetailPembayaran::class, 'id_pembayaran', 'id');
    }
}
