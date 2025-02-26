<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Nova\Insurer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Insurer::factory()
            ->count(5)
            ->state(new Sequence(
                ['name' => 'Covéa'],
                ['name' => 'Axa'],
                ['name' => 'Macif'],
                ['name' => 'Allianz'],
                ['name' => 'Matmut'],
            ))
            ->create();
    }
}
