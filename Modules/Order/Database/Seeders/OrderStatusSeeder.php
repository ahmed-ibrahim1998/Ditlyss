<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Entities\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'name' => [
                'en' => 'Accepted',
                'ar' => 'تم قبول الطلب'
            ],
            'color'=>'bg-primary'
        ]);

        OrderStatus::create([
            'name' => [
                'en' => 'Preparing',
                'ar' => 'جاري تجهيز الطلب'
            ],
            'color'=>'bg-info'
        ]);

        OrderStatus::create([
            'name' => [
                'en' => 'On the way',
                'ar' => 'في الطريق'
            ],
            'color'=>'bg-warning'
        ]);
        OrderStatus::create([
            'name' => [
                'en' => 'Failure',
                'ar' => 'فشل'
            ],
            'color'=>'bg-danger'
        ]);
        OrderStatus::create([
            'name' => [
                'en' => 'Done',
                'ar' => 'تم الانتهاء'
            ],
            'color'=>'bg-success'
        ]);
    }
}
