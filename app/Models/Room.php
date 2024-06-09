<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender', 'gedung', 'lantai', 'kamar','penghuni'
    ];

    /**
     * Handle the logic when a Room model is saved.
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($room) {
            Log::info('Room saved event triggered');

            if ($room->wasChanged('penghuni')) {
                Log::info('penghuni field was changed');
                $penghuniBaru = $room->penghuni;

                // Find the user associated with the penghuni
                $user = User::where('nim', $penghuniBaru)->first();

                if ($user) {
                    $user->kamar = $room->kamar;
                    $user->save();
                    Log::info("User {$user->nim} assigned to kamar {$room->kamar}");
                } else {
                    Log::warning("User with nim {$penghuniBaru} not found");
                }
            } else {
                Log::info('penghuni field was not changed');
            }
        });
    }
}
