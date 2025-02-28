<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Critair;
use App\Models\Energy;
use App\Models\Flocking;
use App\Models\Lessor;
use App\Models\Status;
use App\Models\TireCondition;
use App\Models\TireType;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Nova\Metrics\TotalVehicles;
use App\Nova\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Nova\Fields\Date;

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
            'mileage' => faker()->number(0, 17000),
            'last_statement' => faker()->dateTime('-15 day', 'now'),
            'co2_emission' => faker()->number(0, 10000),
            'attribution_date' => faker()->dateTime('-5 years', 'now'),
            'restitution_date' => faker()->dateTime('now', '+5 years'),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Vehicle $vehicle) {
            if (!$vehicle->hasAttribute($vehicle->model()->getForeignKeyName())) {
                $vehicle->model()->associate(VehicleModel::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->frontLeftTireCondition()->getForeignKeyName())) {
                $vehicle->frontLeftTireCondition()->associate(TireCondition::factory()->createOne());
            }
            if (!$vehicle->hasAttribute($vehicle->frontRightTireCondition()->getForeignKeyName())) {
                $vehicle->frontRightTireCondition()->associate(TireCondition::factory()->createOne());
            }
            if (!$vehicle->hasAttribute($vehicle->rearLeftTireCondition()->getForeignKeyName())) {
                $vehicle->rearLeftTireCondition()->associate(TireCondition::factory()->createOne());
            }
            if (!$vehicle->hasAttribute($vehicle->rearRightTireCondition()->getForeignKeyName())) {
                $vehicle->rearRightTireCondition()->associate(TireCondition::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->status()->getForeignKeyName())) {
                $vehicle->status()->associate(Status::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->company()->getForeignKeyName())) {
                $vehicle->company()->associate(Company::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->locationCity()->getForeignKeyName())) {
                $vehicle->locationCity()->associate(City::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->locationDoubleKeyCity()->getForeignKeyName())) {
                $vehicle->locationDoubleKeyCity()->associate(City::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->energy()->getForeignKeyName())) {
                $vehicle->energy()->associate(Energy::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->critair()->getForeignKeyName())) {
                $vehicle->critair()->associate(Critair::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->flocking()->getForeignKeyName())) {
                $vehicle->flocking()->associate(Flocking::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->tireType()->getForeignKeyName())) {
                $vehicle->tireType()->associate(TireType::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->contract()->getForeignKeyName())) {
                $vehicle->contract()->associate(Contract::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->lessor()->getForeignKeyName())) {
                $vehicle->lessor()->associate(Lessor::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->driver()->getForeignKeyName())) {
                $vehicle->driver()->associate(\App\Models\User::factory()->createOne());
            }

            if (!$vehicle->hasAttribute($vehicle->vehicleType()->getForeignKeyName())) {
                $vehicle->driver()->associate(\App\Models\VehicleType::factory()->createOne());
            }
        });
    }
}
