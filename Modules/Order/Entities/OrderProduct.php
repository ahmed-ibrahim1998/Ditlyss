<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public $incrementing = true;
    protected $table = 'order_products';
    protected $fillable = ['product_id', 'order_id', 'price', 'qty'];
    public $timestamps = true;
    protected $with = ['orderProductAttribute'];

    public function orderProductAttribute(): HasMany
    {
        return $this->hasMany(OrderProductAttribute::class, 'order_product_id', 'id');
    }
}
