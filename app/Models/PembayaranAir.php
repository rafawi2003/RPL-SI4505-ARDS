<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; 

class PembayaranAir extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembayaran_air'; // Tentukan nama tabel secara eksplisit

    protected $fillable = [
        'nim',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}

