<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';
    protected $guarded = ['id'];

    public function rumah()
    {
        return $this->belongsToMany(Rumah::class, PromoRumah::class, 'id_promo', 'id_rumah');
    }
}
