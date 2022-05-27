<?php

namespace Modules\Vendor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Entities\PaymentMethod;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        PaymentMethod::create([
            'name' => [
                'ar' => 'الدفع عند التوصيل',
                'en' => 'Cash on Delivery',
            ],
            'is_active' => true,
            'extra_fee' => 10,
            'fee_type' => 'percentage',
        ]);
        PaymentMethod::create([
            'name' => [
                'ar' => 'KNET',
                'en' => 'KNET',
            ],
            'is_active' => true,
            'extra_fee' => 5,
            'fee_type' => 'percentage',
        ]);
        PaymentMethod::create([
            'name' => [
                'ar' => 'بطاقة دفع',
                'en' => 'Credit Card',
            ],
            'is_active' => true,
            'extra_fee' => 2,
            'fee_type' => 'percentage',
        ]);
    }
}
