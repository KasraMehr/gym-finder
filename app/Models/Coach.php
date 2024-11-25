<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = "athletes";
    protected $primaryKey = 'CoachIDi';
    protected $fillable = [
        'Specialties',
        'Certifications',
        'ExperienceYears',
        'Rating',
        'documents_honors',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function clubClasses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(ClubClass::class);
    }

    public function athletes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Athlete::class, 'athlete_coach', 'CoachID', 'AthleteID');
    }
    public function gyms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(GymOwner::class, 'coach_gym', 'CoachID', 'GymID');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
