<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = "reviews";
    protected $primaryKey = 'ReviewID';
    protected $fillable = [
        'name',
        'description',
        'olampyan',

    ];

    public function clubClasses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ClubClass::class);
    }

    use HasFactory;
}
