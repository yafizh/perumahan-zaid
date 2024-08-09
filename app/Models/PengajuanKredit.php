<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_kredit';
    protected $guarded = ['id'];

    public function tanggalPengajuan()
    {
        $tanggal = Carbon::create($this->tanggal_pengajuan)->locale('ID');
        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }
    public function tanggalVerifikasi()
    {
        $tanggal = Carbon::create($this->tanggal_verifikasi)->locale('ID');
        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'id_rumah', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function rumahPelanggan()
    {
        return $this->belongsTo(RumahPelanggan::class, 'id_rumah', 'id_rumah');
    }
}
