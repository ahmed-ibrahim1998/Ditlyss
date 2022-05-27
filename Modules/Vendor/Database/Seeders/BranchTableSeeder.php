<?php

namespace Modules\Vendor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Entities\Area;
use Modules\Vendor\Entities\Branch;
use Modules\Vendor\Entities\Vendor;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Branch::create([
            'name' => [
                'en' => 'Maadi',
                'ar' => 'المعادي'
            ],
            'vendor_id' => Vendor::all()->random(1)->first()->id,
            'area_id' => Area::all()->random(1)->first()->id,
            'status' => 'Status',
            'is_active' =>'open',
            'lat' => '12312.123123',
            'long' => '12312.123123',
            'address' => '20 street',
            'is_featured' => true,
            'delivery_time' => 1
        ]);
        Branch::create([
            'name' => [
                'en' => 'gizz',
                'ar' => 'ألجيزة'
            ],
            'vendor_id' => Vendor::all()->random(1)->first()->id,
            'area_id' => Area::all()->random(1)->first()->id,
            'status' => 'Status',
            'is_active' => true,
            'lat' => '12312.123123',
            'long' => '12312.123123',
            'address' => '20 street',
            'is_featured' => true,
            'delivery_time' => 1
        ]);
        Branch::create([
            'name' => [
                'en' => 'haram',
                'ar' => 'الهرم'
            ],
            'vendor_id' => Vendor::all()->random(1)->first()->id,
            'area_id' => Area::all()->random(1)->first()->id,
            'status' => 'Status',
            'is_active' => true,
            'lat' => '12312.123123',
            'long' => '12312.123123',
            'address' => '20 street',
            'is_featured' => true,
            'delivery_time' => 1
        ]);
    }
}
