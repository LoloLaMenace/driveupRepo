<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Statut;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration' => faker()->uppercase()->convertCharacters('??-###-??'),
            'vehicle_model_id' => VehicleModel::factory(),
            'status_id' => Status::factory(),
        ];
    }
}
