<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\VehicleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = Brand::factory()
            ->state(['name' => 'Peugeot'])
            ->createOne();

        VehicleModel::factory()
            ->for($brand)
            ->state(new Sequence(
                ['name' => '308'],
                ['name' => '3008'],
                ['name' => '5008'],
                ['name' => '408'],
                ['name' => '208'],
                ['name' => '2008'],
                ['name' => '508'],
            ))
            ->count(5)
            ->create();

        $brand = Brand::factory()
            ->state(['name' => 'Audi'])
            ->createOne();

        VehicleModel::factory()
            ->for($brand)
            ->state(new Sequence(
                ['name' => 'E-tron'],
            ))
            ->count(1)
            ->create();

        $brand = Brand::factory()
            ->state(['name' => 'Tesla'])
            ->createOne();

        VehicleModel::factory()
            ->for($brand)
            ->state(new Sequence(
                ['name' => 'Model S'],
            ))
            ->count(1)
            ->create();

        $brand = Brand::factory()
            ->state(['name' => 'Renault'])
            ->createOne();

        VehicleModel::factory()
            ->for($brand)
            ->state(new Sequence(
                ['name' => 'Megane'],
                ['name' => 'Australe'],
                ['name' => 'Clio 4'],
                ['name' => 'Clio 5'],
            ))
            ->count(4)
            ->create();
    }
}
