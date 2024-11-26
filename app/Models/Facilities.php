<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
   protected $table = "gym_facilities";
   protected $primaryKey = 'FacilityID';
   protected $fillable = [
      'name',
      'description',
   ];

   public function gym(): \Illuminate\Database\Eloquent\Relations\BelongsTo
   {
      return $this->BelongsTo(Gym::class, 'GymID');
   }

   use HasFactory;
}
