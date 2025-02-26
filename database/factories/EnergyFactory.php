<?php

namespace Database\Factories;

use App\Models\Energy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Energy
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class EnergyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Energy::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => faker()->name(),
            'acronym' =>faker()->convertCharacters('??'),
        ];
    }
}
