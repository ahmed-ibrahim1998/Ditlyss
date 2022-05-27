<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;

class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'ar' => $this->faker->name,
                'en' => $this->faker->text(10),
            ],
            'type' => $this->faker->randomElement(['single', 'multi']),
            'min' => $this->faker->randomNumber(),
            'max' => $this->faker->randomNumber(),
            'product_id' => Product::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
