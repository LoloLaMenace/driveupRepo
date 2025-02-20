<?php

namespace Database\Factories;

use App\Models\Flocking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Flocking
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class FlockingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Flocking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => faker()->name(),
        ];
    }
}
