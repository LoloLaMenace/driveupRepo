<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function models(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
