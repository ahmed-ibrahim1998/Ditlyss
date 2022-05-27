<?php

namespace Modules\Vendor\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Locations\Entities\Area;
use Modules\Vendor\Entities\Branch;
use Modules\Vendor\Entities\Vendor;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor1 = Vendor::create([
            'name' => [
                'en' => 'KFC',
                'ar' => 'دجاج كنتاكي',
            ],
            'is_active' => true,
            'is_featured' => true,
            'ordering' => 0,
            'phone' => '011165435321',
            'address' => 'Street some where in the city',
            'commission' => 10,
        ]);

        $b1 = Branch::create([
            'name' => [
                'en' => 'Maadi',
                'ar' => 'المعادي'
            ],
            'vendor_id' => $vendor1->id,
            'area_id' => Area::all()->random(1)->first()->id,
            'status' => 'Status',
            'is_active' => true,
            'lat' => '12312.123123',
            'long' => '12312.123123',
            'address' => '20 street',
            'is_featured' => true,
            'delivery_time' => 1
        ]);
        $b2 = Branch::create([
            'name' => [
                'en' => 'gizz',
                'ar' => 'ألجيزة'
            ],
            'vendor_id' => $vendor1->id,
            'area_id' => Area::all()->random(1)->first()->id,
            'status' => 'Status',
            'is_active' => true,
            'lat' => '12312.123123',
            'long' => '12312.123123',
            'address' => '20 street',
            'is_featured' => true,
            'delivery_time' => 1
        ]);

        $vendor1->users()->attach([
            User::whereIs('vendor')->get()->random(1)->first()->id => [
                'branch_id' => $b1->id,
            ]
        ]);
        $vendor1->users()->attach([
            User::whereIs('vendor')->get()->random(1)->first()->id => [
                'branch_id' => $b2->id,
            ]
        ]);

        $vendor2 = Vendor::create([
            'name' => [
                'en' => 'Wings',
                'ar' => 'وينجز',
            ],
            'is_active' => true,
            'ordering' => 0,
            'phone' => '011165435321',
            'address' => 'Street some where in the city',
            'commission' => 10,
        ]);
        $vendor2->users()->attach([
            User::whereIs('vendor')->get()->random(1)->first()->id => [
                'branch_id' => Branch::all()->random(1)->first()->id,
            ]
        ]);
    }
}
