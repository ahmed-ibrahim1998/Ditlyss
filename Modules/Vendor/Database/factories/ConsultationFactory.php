<?php

namespace Modules\Vendor\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;
use Modules\Vendor\Entities\Consultation;

class ConsultationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(1)->first()->id,
            'age' => rand(3, 100),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'height' => rand(20, 140),
            'weight' => rand(20, 80),
            'physical_activity' => $this->faker->word,
            'additional_notes' => $this->faker->text(),
        ];
    }
}

