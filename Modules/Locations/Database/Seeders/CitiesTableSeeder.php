<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Entities\City;
use Modules\Locations\Entities\Country;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => [
                'en' => 'Al-Ahmady',
                'ar' => 'الاحمدي'
            ],
            'country_id' => 1
        ]);
        City::create([
            'name' => [
                'en' => 'Fontas',
                'ar' => 'الفنطاس'
            ],
            'country_id' => 1
        ]);
    }
}
