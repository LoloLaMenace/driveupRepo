<?php

namespace Database\Factories;

use App\Models\Critair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Critair
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class CritairFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Critair::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => faker()->number(0, 5)
        ];
    }
}
