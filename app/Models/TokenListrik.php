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
    ];
}
