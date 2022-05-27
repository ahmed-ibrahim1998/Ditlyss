<?php

namespace Modules\Vendor\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Vendor\Entities\ConsultationPackage;
use Modules\Vendor\Entities\Vendor;

class ConsultationPackageFactory extends Factory
{
    protected $model = ConsultationPackage::class;

    public function definition()
    {
        return [
            'name' => ['ar' => $this->faker->name, 'en' => $this->faker->name],
            'price' => $this->faker->numberBetween(10, 500),
            'vendor_id' => Vendor::all()->random(1)->first()->id,
        ];
    }

}
