<?php

namespace Database\Factories;

use App\Models\TireCondition;
use App\Models\TireType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\TireCondition
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class TireConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = TireCondition::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => faker()->name(),
            'color' => faker()->safeHexColor(),
        ];
    }
}
