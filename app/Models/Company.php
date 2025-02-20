<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
