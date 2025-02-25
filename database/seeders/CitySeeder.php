<?php

namespace Database\Seeders;

use App\Nova\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\City::factory()
            ->count(10)
            ->create();
    }
}
