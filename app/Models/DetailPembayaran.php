<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pembayaran';
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran', 'id');
    }

    public function tanggalPembayaran()
    {
        $tanggal = Carbon::create($this->tanggal_pembayaran)->locale('ID');
        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }

    public function tanggalVerifikasi()
    {
        $tanggal = Carbon::create($this->tanggal_verifikasi)->locale('ID');
        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }
}
