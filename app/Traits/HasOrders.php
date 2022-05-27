<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Order\Entities\Order;

trait HasOrders
{
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
