<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenListrik extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_transaksi',
        'nominal_transaksi',
        'status_transaksi',
        'NIM',
        'nama_pengguna',
        'bukti_pembayaran',
        'token', // Ensure this line is included
    ];

    public function generateToken()
    {
        $this->token = $this->generateRandomToken();
        $this->save();
    }

    private function generateRandomToken()
{
    return str_pad(mt_rand(1, intval(99999999999999999999)), 20, '0', STR_PAD_LEFT);
}

}


