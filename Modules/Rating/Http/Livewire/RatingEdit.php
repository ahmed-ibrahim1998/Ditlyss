<?php

namespace Modules\Rating\Http\Livewire;

use Livewire\Component;
use Modules\Order\Entities\Order;

class RatingEdit extends Component
{
    public $rating;
    public $order;
    public $products;

    public function mount()
    {
        $this->order = Order::find($this->rating['id']);

    }


    public function render()
    {
        return view('livewire.rating-edit');
    }
}
