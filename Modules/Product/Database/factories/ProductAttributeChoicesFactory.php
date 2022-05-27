<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeChoise;

class ProductAttributeChoicesFactory extends Factory
{
    protected $model = ProductAttributeChoise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'ar' => $this->faker->text(10),
                'en' => $this->faker->text(8),
            ],
            'additional_price' => $this->faker->randomDigit(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'attribute_id' => ProductAttribute::factory(),
        ];
    }
}
