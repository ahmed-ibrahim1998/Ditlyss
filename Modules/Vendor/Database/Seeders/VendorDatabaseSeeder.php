<?php

namespace Modules\Vendor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VendorDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(VendorTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(VendorUserTableSeeder::class);
        $this->call(ConsultationPackageSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);

    }
}
