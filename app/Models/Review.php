<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $primaryKey = 'ReviewID';
    protected $fillable = [
        'Rating',
        'comment',
        'ReviewDate',

    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Coach::class,  'athlete_coach', 'CoachID','AthleteID');
    }

    use HasFactory;
}