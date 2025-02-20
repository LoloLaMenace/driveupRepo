<?php

namespace Database\Factories;

use App\Models\TireType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\TireType
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class TireTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = TireType::class;

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
