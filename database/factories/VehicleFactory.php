<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Critair;
use App\Models\Energy;
use App\Models\Flocking;
use App\Models\Status;
use App\Models\TireType;
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
            'chassis_number' => faker()->uppercase()->convertCharacters(string: '################'),
            'contract_mileage' => faker()->number(0, 17000),
            'mileage' => faker()->number(0, 17000),
            'last_statement' => faker()->dateTime('-15 day', 'now'),
            'vehicle_model_id' => VehicleModel::factory(),
            'status_id' => Status::factory(),
            'location_city_id' => City::factory(),
            'location_duplicate_key_city_id' => City::factory(),
            'company_id' => Company::factory(),
            'energy_id' => Energy::factory(),
            'co2_emission' => faker()->number(0, 10000),
            'tire_type_id' => TireType::factory(),
            'critair_id' => Critair::factory(),
            'flocking_id' => Flocking::factory(),
        ];
    }
}
