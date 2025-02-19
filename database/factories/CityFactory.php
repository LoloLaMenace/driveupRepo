<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\City
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
