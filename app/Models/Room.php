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
        'gender', 'gedung', 'lantai', 'kamar', 'penghuni'
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
                $penghuniLama = $room->getOriginal('penghuni');
                $penghuniBaru = $room->penghuni;

                // Handle logic for old penghuni
                if ($penghuniLama) {
                    $userLama = User::where('nim', $penghuniLama)->first();
                    if ($userLama) {
                        $userLama->kamar = null;
                        $userLama->status = 'Mohon Hubungi Admin';
                        $userLama->save();
                        Log::info("User {$userLama->nim} removed from old kamar");
                    } else {
                        Log::warning("User with nim {$penghuniLama} not found");
                    }
                }

                // Handle logic for new penghuni
                if ($penghuniBaru) {
                    $userBaru = User::where('nim', $penghuniBaru)->first();
                    if ($userBaru) {
                        $userBaru->kamar = $room->kamar;
                        $userBaru->save();
                        Log::info("User {$userBaru->nim} assigned to new kamar {$room->kamar}");
                    } else {
                        Log::warning("User with nim {$penghuniBaru} not found");
                    }
                }
            } else {
                Log::info('penghuni field was not changed');
            }
        });
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'penghuni', 'nim');
    }
}
