<?php

namespace Modules\Vendor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Vendor\Entities\ConsultationPackage;

class ConsultationPackageSeeder extends Seeder
{
    
    public function run()
    {
        ConsultationPackage::factory()->count(30)->create();
    }
}
