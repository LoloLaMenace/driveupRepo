<?php

namespace Database\Seeders;

use App\Nova\Lessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Lessor::factory()
            ->count(5)
            ->state(new Sequence(
                ['name' => 'Hertz'],
                ['name' => 'Europcar'],
                ['name' => 'ADA'],
                ['name' => 'Avis'],
                ['name' => 'Budget'],
            ))
            ->create();
    }
}
