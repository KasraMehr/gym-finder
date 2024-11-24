<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = "gyms";
    protected $primaryKey = 'GymID';
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

    public function clubClass(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMAny(ClubClass::class);
    }

    use HasFactory;
}
