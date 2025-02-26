<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flocking extends Model
{
    /** @use HasFactory<\Database\Factories\FlockingFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
