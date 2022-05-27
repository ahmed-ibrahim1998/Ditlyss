<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\ProductCategory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'en' => $this->faker->text(12),
                'ar' => $this->faker->text(12),
            ],
            'ordering' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean(60),
            'is_featured' => true,
        ];
    }
}
