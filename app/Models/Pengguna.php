<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $guarded = ['id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id', 'id_pengguna');
    }

    public function staf()
    {
        return $this->belongsTo(Staf::class, 'id', 'id_pengguna');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'id_pengguna');
    }

    public function direktur()
    {
        return $this->belongsTo(Direktur::class, 'id', 'id_pengguna');
    }
}
