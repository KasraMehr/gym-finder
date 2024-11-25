<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubClass extends Model
{
    protected $table = "classes";
    protected $primaryKey = 'ClassID';
    protected $fillable = [
        'className',
        'schedule',
        'duration',
        'price',
        'MaxParticipants',
    ];

    public function gym(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Gym::class, 'GymID');
    }

    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Coach::class, 'CoachID');
    }

    public function sport(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Sport::class, 'SportID');
    }

    public function bookings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Booking::class);
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    use HasFactory;
}
