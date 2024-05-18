<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranWifi extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_wifi';

    protected $fillable = [
        'jenis_transaksi',
        'nominal_transaksi',
        'status_transaksi',
        'nim',
        'kamar',
        'bukti_pembayaran',
    ];
}
