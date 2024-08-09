<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPelanggan extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pelanggan';
    protected $guarded = ['id'];
}
