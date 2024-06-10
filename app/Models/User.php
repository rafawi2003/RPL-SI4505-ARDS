<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Filament\Models\Contracts\FilamentUser;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'kamar', 'nim', 'status', 'gender', 'email', 'password',
        'usertype', 'jurusan', 'nama_ibu', 'nomor_telepon', 'telefon_darurat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define a relationship with the Room model.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'kamar', 'kamar');
    }

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->usertype, 'admin');
    }

    /**
     * Handle the logic when a User model is saved.
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($user) {
            Log::info('User saved event triggered');

            if ($user->wasChanged('kamar')) {
                Log::info('kamar field was changed');
                $kamarLama = $user->getOriginal('kamar');
                $kamarBaru = $user->kamar;

                // Find the room associated with the old kamar and clear penghuni
                if ($kamarLama) {
                    $roomLama = Room::where('kamar', $kamarLama)->first();
                    if ($roomLama) {
                        $roomLama->penghuni = null;
                        $roomLama->save();
                        Log::info("Penghuni cleared from old room {$roomLama->kamar}");
                    } else {
                        Log::warning("Old room for kamar {$kamarLama} not found");
                    }
                }

                // Find the room associated with the new kamar
                $roomBaru = Room::where('kamar', $kamarBaru)->first();
                if ($roomBaru) {
                    $roomBaru->penghuni = $user->nim;
                    $roomBaru->save();
                    Log::info("User {$user->nim} assigned to new room {$roomBaru->kamar}");
                } else {
                    Log::warning("New room for kamar {$kamarBaru} not found");
                }
            } else {
                Log::info('kamar field was not changed');
            }
        });
    }
}
