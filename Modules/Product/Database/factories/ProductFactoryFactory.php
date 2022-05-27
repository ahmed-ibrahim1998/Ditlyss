<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\ProductCategory;
use Modules\Vendor\Entities\Branch;

class ProductFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

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
                'en' => $this->faker->text(15),
            ],
            'cat_id' => ProductCategory::all()->random(1)->first()->id,
            'branch_id' => Branch::all()->random(1)->first()->id,
            'price' => $this->faker->randomDigit(),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}

