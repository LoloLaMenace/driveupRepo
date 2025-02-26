<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energy extends Model
{
    /** @use HasFactory<\Database\Factories\EnergyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym'
    ];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
