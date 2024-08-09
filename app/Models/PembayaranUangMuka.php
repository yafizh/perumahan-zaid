<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranUangMuka extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_uang_muka';
    protected $guarded = ['id'];

    public function tanggal()
    {
        $tanggal = Carbon::create($this->tanggal)->locale('ID');

        return $tanggal->day . " " . $tanggal->getTranslatedMonthName() . " " . $tanggal->year;
    }

    public function rumahPelanggan()
    {
        return $this->belongsTo(RumahPelanggan::class, 'id_rumah_pelanggan', 'id');
    }
}
