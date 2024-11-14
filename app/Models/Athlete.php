<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $table = "athletes";
    protected $primaryKey = 'AthleteID';
    protected $fillable = [
        'interests',
        'goals',
        'honors',
        'membership_level',
        'hide_profile',
        'age_group',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Coach::class,  'athlete_coach', 'AthleteID','CoachID');
    }

    public function gyms(): \Illuminate\Database\Eloquent\Relations\BelongsToMan
    {
        return $this->belongsToMany(GymOwners::class, 'gyms_athletes', 'AthleteID', 'GymOwnerID');
    }
}
