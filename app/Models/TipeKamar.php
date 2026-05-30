<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    protected $primaryKey = 'id_tipe';

    protected $fillable = ['tipe_kamar', 'harga'];

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id_tipe');
    }
}