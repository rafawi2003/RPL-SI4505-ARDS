<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dormshop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_transaksi', 'nominal_transaksi', 'status_transaksi', 'NIM',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dormshop';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
