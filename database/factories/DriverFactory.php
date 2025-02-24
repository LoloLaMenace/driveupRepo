<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \App\Models\Driver
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => faker()->name(),
            'company_id' => Company::factory(),
            'phone_number' => faker()->convertCharacters(string: '##########'),
            'email' => faker()->email(),
            'license_number' => faker()->number(0, 99999999),
            'attribution_date' => faker()->dateTime('-5 years', 'now'),
            'restitution_date' => faker()->dateTime('now', '+5 years'),
        ];
    }
}
