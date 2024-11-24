<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";
    protected $primaryKey = 'BookingID';
    protected $fillable = [
        'BookingDate',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function clubClass(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->HasOne(Coach::class,  'ClassID');
    }

    public function athlete(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->HasOne(Athlete::class,  'AthleteID');
    }
    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Payment::class);
    }

    use HasFactory;
}
