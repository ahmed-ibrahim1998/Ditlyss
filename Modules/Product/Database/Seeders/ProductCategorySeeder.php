<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Entities\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name' => [
                'en' => 'Vegetables',
                'ar' => 'خضروات',
            ],
            'ordering' => random_int(0, 10),
            'is_active' => true,
        ]);
        ProductCategory::create([
            'name' => [
                'en' => 'fish',
                'ar' => 'اسماك',
            ],
            'ordering' => random_int(0, 10),
            'is_active' => true,
        ]);
        ProductCategory::create([
            'name' => [
                'en' => 'cat3',
                'ar' => 'القسم 3 ',
            ],
            'ordering' => random_int(0, 10),
            'is_active' => true,
        ]);
        ProductCategory::create([
            'name' => [
                'en' => 'cat 4',
                'ar' => 'القسم 4 ',
            ],
            'ordering' => random_int(0, 10),
            'is_active' => true,
        ]);
    }
}
