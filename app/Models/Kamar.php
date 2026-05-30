<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $primaryKey = 'no_kamar';

    protected $fillable = ['id_tipe', 'fasilitas'];

    public function tipe()
    {
        return $this->belongsTo(TipeKamar::class, 'id_tipe');
    }

    public function tipeKamar()
    {
        return $this->tipe();
    }

    public function sewa()
    {
        return $this->hasMany(Sewa::class, 'no_kamar');
    }
}

