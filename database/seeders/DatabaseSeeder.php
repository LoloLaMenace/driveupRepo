<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
use App\Nova\Brand;
use App\Nova\VehicleModel;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        $this->call(BrandSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(InsurerSeeder::class);
        $this->call(LessorSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}
