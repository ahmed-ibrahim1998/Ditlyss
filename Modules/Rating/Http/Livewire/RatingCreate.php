<?php

namespace Modules\Rating\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Modules\Rating\Entities\Rating;
use RealRashid\SweetAlert\Toaster;

class RatingCreate extends Component
{

    public $orders;
    public $order;
    public $users;
    public $user_id;
    public $products;
    public $ratings;


    public $packaging;
    public $delivery_time;
    public $value_for_price;

    public $driver_rating;

    public function mount()
    {
        $this->users = User::whereIs('client')->get();
        $this->orders = Order::with('products')->get();
        $this->user_id = $this->users[0]->id;
    }

    public function selectOrder($order_id): void
    {
        if ($order_id !== '') {
            $this->order = $this->orders->find($order_id);
            $this->products = $this->order->products;
        }
    }


    public function saveRatings()
    {
        // Branch Rating
        Rating::create([
            'order_id' => $this->order['id'],
            'user_id' => $this->user_id,
            'ratable_type' => null,
            'ratable_id' => null,
            'delivery_time' => $this->delivery_time,
            'value_for_price' => $this->value_for_price,
            'order_packaging' => $this->packaging,
            'driver_performance' => $this->driver_rating,
        ]);
        foreach ($this->products as $product) {
            Rating::create([
                'order_id' => $this->order['id'],
                'user_id' => $this->user_id,
                'ratable_type' => Product::class,
                'ratable_id' => $product['id'],
                'delivery_time' => $this->delivery_time,
                'value_for_price' => $this->value_for_price,
                'order_packaging' => $this->packaging,
                'rating' => $this->ratings[$product['id']]
            ]);
        }
        toast(__('rating::messages.created-successfully'), 'success');
        return redirect()->route('ratings.index');

    }

    public function render()
    {
        return view('rating::livewire.rating-create');
    }
}
