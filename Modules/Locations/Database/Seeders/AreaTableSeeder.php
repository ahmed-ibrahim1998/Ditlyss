<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => [
                'en' => 'First Street',
                'ar' => 'الحي الاول '
            ],
            'city_id' => City::all()->random(1)->first()->id,
        ]);
        Area::create([
            'name' => [
                'en' => 'Second Street',
                'ar' => 'الحي الثاني '
            ],
            'city_id' => City::all()->random(1)->first()->id,
        ]);
    }
}
