<?php

namespace Modules\Order\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Entities\OrderStatus;

class OrderStatusFactory extends Factory
{
    protected $model = OrderStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'en' => $this->faker->text(10),
                'ar' => $this->faker->name(10),
            ],
            'color' => array_rand(['bg-danger', 'bg-success', 'bg-primary', 'bg-info', 'bg-warning'])
        ];
    }
}
