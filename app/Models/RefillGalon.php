<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefillGalon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim',
        'nomor_kamar',
        'jumlah_galon',
        'total_harga',
        // Tambahkan atribut lain yang sesuai dengan kebutuhan Anda
    ];
}
