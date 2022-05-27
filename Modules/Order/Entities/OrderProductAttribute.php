<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeChoise;

class OrderProductAttribute extends Model
{

    protected $table = 'order_product_attributes';
    protected $fillable = ['order_product_id', 'product_attribute_id'];
    protected $with = ['attribute', 'orderProductAttributeChoices'];

    public function orderProductAttributeChoices(): HasMany
    {
        return $this->hasMany(OrderProductAttributeChoices::class, 'order_product_attribute_id', 'id');
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id', 'id');
    }
}
