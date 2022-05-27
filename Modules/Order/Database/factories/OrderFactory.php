<?php

namespace Modules\Order\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Coupon\Entities\Coupon;
use Modules\Locations\Entities\Area;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderStatus;
use Modules\Vendor\Entities\Branch;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'area_id' => Area::all()->random(1)->first()->id,
            'client_id' => User::whereIs('client')->get()->pluck('id')->random(1)->first(),
            'driver_id' => User::whereIs('driver')->get()->pluck('id')->random(1)->first(),
            'coupon_id' => random_int(0, 10),
            'branch_id' => Branch::all()->random(1)->first()->id,
            'status_id' => OrderStatus::all()->random(1)->first()->id,
            'subtotal' => $this->faker->randomDigit(),
            'delivery_fees' => $this->faker->randomDigit(),
            'discount' => $this->faker->randomDigit(),
            'total' => $this->faker->randomDigit(),
            'prepared_at' => $this->faker->dateTime(),
            'handed_at' => $this->faker->dateTime(),
            'delivered_at' => $this->faker->dateTime(),
            'payment_url' => $this->faker->imageUrl(200, 200),
            'address'=> $this->faker->address,
        ];
    }
}
