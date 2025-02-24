<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    public function casts(): array
    {
        return [
            'attribution_date' => 'datetime:Y-m-d',
            'restitution_date' => 'datetime:Y-m-d',
        ];
    }

    public function vehicle(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(Vehicle::class);
    }
}
