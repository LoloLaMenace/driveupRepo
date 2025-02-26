<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TireType extends Model
{
    /** @use HasFactory<\Database\Factories\TireTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

}
