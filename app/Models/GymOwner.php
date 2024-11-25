<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymOwner extends Model
{
    use HasFactory;
    protected $table = "athletes";
    protected $primaryKey = 'GymOwnerID';
    protected $fillable = [
        'contact_info'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function gym(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Gym::class,  'GymID');
    }
}
