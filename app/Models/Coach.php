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

    public function athlete(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Athlete::class);
    }
    public function gymOwner(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(GymOwner::class);
    }
}
