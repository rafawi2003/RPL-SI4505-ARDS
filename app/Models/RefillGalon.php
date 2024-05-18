<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefillGalon extends Model
{
    use HasFactory;

    protected $table = 'refill_galon';

    protected $fillable = [
        'nim',
        'nomor_kamar',
        'jumlah_galon',
        'total_harga',
        'bukti_pembayaran',
        'metode_pembayaran',
    ];
}
