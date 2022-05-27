<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Entities\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => [
                'en' => 'kuwait',
                'ar' => 'الكويت'
            ],
            'number_prefix' => '965',
        ]);
    }
}
