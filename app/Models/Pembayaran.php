<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_sewa',
        'tgl_bayar',
        'jumlah',
        'bukti',
    ];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class, 'id_sewa');
    }
}