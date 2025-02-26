<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critair extends Model
{
    /** @use HasFactory<\Database\Factories\CritairFactory> */
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}

