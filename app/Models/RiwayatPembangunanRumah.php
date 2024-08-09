<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembangunanRumah extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pembangunan_rumah';
    protected $guarded = ['id'];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'id_rumah', 'id');
    }
}
