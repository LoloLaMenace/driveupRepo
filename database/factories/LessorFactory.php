<?php

namespace Database\Factories;

use App\Models\Lessor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Lessor
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class LessorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Lessor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => faker()->name()
        ];
    }
}
