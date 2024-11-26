<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facalities extends Model
{
   protected $table = "gym_facalities";
   protected $primaryKEy = 'FacalityID';
   protected $fillable = [
      'name',
      'description',
   ];

   public function gym()
   {
      return $this->BelongsTo(Gym::class, GymID);
   }

   use HasFactory;
}
