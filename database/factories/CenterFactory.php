<?php

namespace Database\Factories;

use App\Models\Center;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Center::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->word(),
            'daily_limit' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
