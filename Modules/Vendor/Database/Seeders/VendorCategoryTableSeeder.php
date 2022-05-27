<?php

namespace Modules\Vendor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Entities\Category;

class VendorCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Category::create([
            'name' => [
                'ar' => 'مطاعم',
                'en' => 'Restaurants',
            ]
        ]);
        Category::create([
            'name' => [
                'ar' => 'صالات رياضية',
                'en' => 'Gym',
            ]
        ]);
        Category::create([
            'name' => [
                'ar' => 'محلات',
                'en' => 'Stores',
            ]
        ]);

    }
}
