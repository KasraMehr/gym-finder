<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = "gyms";
    protected $primaryKey = 'GymID';
    protected $fillable = [
        'GymName',
        'address',
        'city',
        'Rating',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function clubClasses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(ClubClass::class);
    }

    public function gymOwner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GymOwner::class);
    }

    public function coaches(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Coach::class, 'coach_gym', 'GymID', 'CoachID');
    }

    public function athletes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Athlete::class, 'athlete_gym', 'GymID', 'CoachID');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function facalities()
    {
       return $this->HasMany(Facalities::class);
    }
    use HasFactory;
}
