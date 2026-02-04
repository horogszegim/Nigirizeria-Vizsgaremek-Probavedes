<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeSlot extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'is_active'
    ];

    /*
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'time_slot_id', 'id');
    }
    */
}
