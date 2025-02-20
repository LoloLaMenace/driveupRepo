<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleTypeFactory> */
    use HasFactory;

    public function vehiclesModel(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
