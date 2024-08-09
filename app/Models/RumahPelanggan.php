<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahPelanggan extends Model
{
    use HasFactory;

    protected $table = 'rumah_pelanggan';
    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'id_rumah', 'id');
    }

    public function pembayaranUangMuka()
    {
        return $this->hasOne(PembayaranUangMuka::class, 'id_rumah_pelanggan', 'id');
    }

    public function pendaftaranPemesanan()
    {
        return $this->hasOne(PendaftaranPemesanan::class, 'id_rumah_pelanggan', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_rumah_pelanggan', 'id');
    }

    public function pengajuanKredit()
    {
        return $this->hasOne(PengajuanKredit::class, 'id_rumah', 'id_rumah')->latestOfMany();
    }
}
