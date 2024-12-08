<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Center;
use App\Models\Patient;
use App\Models\VaccineRegistration;

class VaccineRegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VaccineRegistration::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'center_id' => Center::factory(),
            'scheduled_date' => $this->faker->dateTime(),
        ];
    }
}
