<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = 'sewa';

    protected $primaryKey = 'id_sewa';

    protected $fillable = [
        'id_user',
        'no_kamar',
        'tgl_masuk',
        'jumlah_bulan',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'no_kamar');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_sewa');
    }
}