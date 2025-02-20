<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
use App\Nova\Brand;
use App\Nova\VehicleModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\Brand::factory()->count(3)
            ->has(
                \App\Models\VehicleModel::factory()->count(5)
                    ->has(
                        Vehicle::factory()->count(5)
                    ),
                'models'
            )
            ->create();


    }
}
