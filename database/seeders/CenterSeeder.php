<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CenterFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CenterFactory::new()->count(10)->create();
    }
}
