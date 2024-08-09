<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $guarded = ['id'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

    public function rumahPelanggan()
    {
        return $this->hasMany(RumahPelanggan::class, 'id_pelanggan', 'id')->orderBy('id', 'DESC');
    }

    public function pengajuanKredit($status = null)
    {
        if (!is_null($status)) {
            return $this->hasMany(PengajuanKredit::class, 'id_pelanggan', 'id')
                ->where('status', $status)
                ->doesntHave('rumahPelanggan')
                ->orderBy('id', 'DESC')
                ->get();
        }

        return $this->hasMany(PengajuanKredit::class, 'id_pelanggan', 'id')
            ->orderBy('id', 'DESC')
            ->get();
    }
}
