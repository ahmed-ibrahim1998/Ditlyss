<?php

namespace Modules\Vendor\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Entities\Branch;
use Modules\Vendor\Entities\Vendor;
use Modules\Vendor\Entities\VendorUser;

class VendorUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = Vendor::whereHas('branches')->get()->random(1)->first();
        VendorUser::create([
            'user_id' => User::whereIs('vendor')->get()->random(1)->first()->id,
            'vendor_id' => $vendor->id,
            'branch_id' => $vendor->branches->random(1)->first()->id,
        ]);

        $vendor = Vendor::whereHas('branches')->get()->random(1)->first();
        VendorUser::create([
            'user_id' => User::whereIs('vendor')->get()->random(1)->first()->id,
            'vendor_id' => $vendor->id,
            'branch_id' => $vendor->branches->random(1)->first()->id,
        ]);

        $vendor = Vendor::whereHas('branches')->get()->random(1)->first();
        VendorUser::create([
            'user_id' => User::whereIs('vendor')->get()->random(1)->first()->id,
            'vendor_id' => $vendor->id,
            'branch_id' => $vendor->branches->random(1)->first()->id,
        ]);

        $vendor = Vendor::whereHas('branches')->get()->random(1)->first();
        VendorUser::create([
            'user_id' => User::whereIs('vendor')->get()->random(1)->first()->id,
            'vendor_id' => $vendor->id,
            'branch_id' => $vendor->branches->random(1)->first()->id,
        ]);
    }
}
