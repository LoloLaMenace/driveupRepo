<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(vehicle::class, 'location_city_id', 'id');
    }

    public function duplicateKeyVehicle(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(vehicle::class, 'location_duplicate_key_city_id', 'id');
    }
}
