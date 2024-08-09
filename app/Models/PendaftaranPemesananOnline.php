<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPemesananOnline extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pemesanan_online';
    protected $guarded = ['id'];

    public function tanggalPemesanan()
    {
        $tanggal = Carbon::create($this->tanggal_pemesanan)->locale('ID');
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

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

    public function tanggalPembelian()
    {
        $tanggal = Carbon::create($this->tanggal_beli)->locale('ID');
        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }
}
