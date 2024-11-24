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

    public function booking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(Booking::class);
    }

    use HasFactory;
}
