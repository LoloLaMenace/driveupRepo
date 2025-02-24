<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Critair;
use App\Models\Driver;
use App\Models\Energy;
use App\Models\Flocking;
use App\Models\Lessor;
use App\Models\Status;
use App\Models\TireCondition;
use App\Models\TireType;
use App\Models\VehicleModel;
use App\Nova\Metrics\TotalVehicles;
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
            'critair_id' => Critair::factory(),
            'flocking_id' => Flocking::factory(),
            'driver_id' => Driver::factory(),
            'front_left_tire_condition_id' => TireCondition::factory(),
            'front_right_tire_condition_id' => TireCondition::factory(),
            'rear_left_tire_condition_id' => TireCondition::factory(),
            'rear_right_tire_condition_id' => TireCondition::factory(),
            'contract_id' => Contract::factory(),
            'lessor_id' => Lessor::factory(),
            'tire_type_id' => TireType::factory(),
        ];
    }
}
