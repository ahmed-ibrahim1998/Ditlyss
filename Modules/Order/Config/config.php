<?php

return [
    'name' => 'Order',
    'relations' => [
        'order' => [
            'area' => fn($self) => $self->belongsTo(\Modules\Locations\Entities\Area::class, 'area_id', 'id'),
            'client' => fn($self) => $self->belongsTo(\App\Models\User::class, 'client_id', 'id'),
            'driver' => fn($self) => $self->belongsTo(\App\Models\User::class, 'driver_id', 'id'),
            'branch' => fn($self) => $self->belongsTo(\Modules\Vendor\Entities\Branch::class, 'branch_id', 'id'),
            'coupon' => fn($self) => $self->belongsTo(\Modules\Coupon\Entities\Coupon::class, 'coupon_id', 'id'),
            'products' => fn($self) => $self->belongsToMany(\Modules\Product\Entities\Product::class, 'order_products')
                ->withPivot('id', 'qty', 'price')->withTimeStamps()->using(\Modules\Order\Entities\OrderProduct::class),

        ],
    ],
];
