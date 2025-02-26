<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicleInstance = new Vehicle();
        $contractInstance = new Contract();

        Vehicle::factory()
            ->state(new Sequence(fn (Sequence $sequence) => [
                $vehicleInstance->model()->getForeignKeyName() => \App\Models\VehicleModel::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->frontLeftTireCondition()->getForeignKeyName() => \App\Models\TireCondition::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->frontRightTireCondition()->getForeignKeyName() => \App\Models\TireCondition::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->rearLeftTireCondition()->getForeignKeyName() => \App\Models\TireCondition::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->rearRightTireCondition()->getForeignKeyName() => \App\Models\TireCondition::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->status()->getForeignKeyName() => \App\Models\Status::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->company()->getForeignKeyName() => \App\Models\Company::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->locationCity()->getForeignKeyName() => \App\Models\City::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->locationDoubleKeyCity()->getForeignKeyName() => \App\Models\City::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->energy()->getForeignKeyName() => \App\Models\Energy::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->critair()->getForeignKeyName() => \App\Models\Critair::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->flocking()->getForeignKeyName() => \App\Models\Flocking::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->tireType()->getForeignKeyName() => \App\Models\TireType::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->lessor()->getForeignKeyName() => \App\Models\Lessor::query()->inRandomOrder()->first()->getKey(),
                $vehicleInstance->contract()->getForeignKeyName() => Contract::factory()->state(new Sequence(fn (Sequence $sequence) => [
                    $contractInstance->insurer()->getForeignKeyName() => \App\Models\Insurer::query()->inRandomOrder()->first()->getKey(),
                ]))->createOne()->getKey(),
                $vehicleInstance->vehicleType()->getForeignKeyName() => \App\Models\VehicleType::query()->inRandomOrder()->first()->getKey(),
            ]))
            ->count(50)
            ->create();
    }
}
