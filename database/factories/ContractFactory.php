<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Insurer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Contract
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => faker()->convertCharacters('##??##??##??##'),
            'started_at' => faker()->dateTime('-5 years', 'now'),
            'finished_at' => faker()->dateTime('now', '+5 years'),
            'rent' => faker()->number(0, 999999),
            'insurer_id' => Insurer::factory(),
        ];
    }
}
