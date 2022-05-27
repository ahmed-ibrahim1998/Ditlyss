<?php
namespace Modules\Trainers\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Trainers\Entities\Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ['ar'=>$this->faker->name,'en'=>$this->faker->name],
            'price' => $this->faker->numberBetween(10, 500),
            'specialty' =>$this->faker->word,
            'definition' =>$this->faker->text,
            'is_active'=>true,
            'is_featured'=>true,
        ];
    }
}

