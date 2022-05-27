<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Product\Entities\ProductAttributeChoise;

class OrderProductAttributeChoices extends Model
{

    protected $table = 'order_product_attribute_choices';

    protected $fillable = ['order_product_attribute_id', 'product_attribute_choice_id', 'price'];
    protected $with = ['choice'];

    public function orderProductAttribute(): BelongsTo
    {
        return $this->belongsTo(OrderProductAttribute::class, 'order_product_attribute_id', 'id');
    }

    public function choice(): BelongsTo
    {
        return $this->belongsTo(ProductAttributeChoise::class, 'product_attribute_choice_id', 'id');
    }
}
