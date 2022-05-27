<?php

namespace Modules\Trainers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Trainers\Entities\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::factory()->count(30)->create();
    }
}
