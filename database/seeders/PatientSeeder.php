<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PatientFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientFactory::new()->count(1000)->create();
    }
}
