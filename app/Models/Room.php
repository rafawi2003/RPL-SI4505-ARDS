<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Room extends Model
{
    protected $fillable = [
        'gender', 'gedung', 'lantai', 'kamar', 'bed_1', 'bed_2', 'bed_3', 'bed_4',
    ];

    /**
     * Update 'kamar' column in 'users' table when any bed is updated.
     */
    public static function boot()
    {
        parent::boot();

        static::updating(function ($room) {
            $beds = collect([$room->bed_1, $room->bed_2, $room->bed_3, $room->bed_4])->filter();

            if ($beds->isNotEmpty()) {
                User::whereIn('nim', $beds)->update(['kamar' => $room->kamar]);
            }
        });
    }

    /**
     * Get the user for the first bed.
     */
    public function bed1User()
    {
        return $this->belongsTo(User::class, 'bed_1', 'nim');
    }

    /**
     * Get the user for the second bed.
     */
    public function bed2User()
    {
        return $this->belongsTo(User::class, 'bed_2', 'nim');
    }

    /**
     * Get the user for the third bed.
     */
    public function bed3User()
    {
        return $this->belongsTo(User::class, 'bed_3', 'nim');
    }

    /**
     * Get the user for the fourth bed.
     */
    public function bed4User()
    {
        return $this->belongsTo(User::class, 'bed_4', 'nim');
    }
}
