<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlokPerumahan extends Model
{
    use HasFactory;

    protected $table = 'blok_perumahan';
    protected $guarded = ['id'];

    public function rumah()
    {
        return $this->hasMany(Rumah::class, 'id_blok_perumahan', 'id')->orderBy('status_ketersediaan');
    }
}
