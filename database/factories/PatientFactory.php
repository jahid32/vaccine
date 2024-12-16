<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Patient;
use Illuminate\Support\Str;
use App\Enums\VaccinationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nid' => $this->faker->word(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'status' => VaccinationStatus::NotScheduled,
            'center_id' => Center::inRandomOrder()->first()->id,
        ];
    }
}
