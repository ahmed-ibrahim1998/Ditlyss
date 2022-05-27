<?php


return [
    'name' => 'Rating',
    'relations' => [
        'ratable' => function ($self) {
            return $self->morphTo();
        },
        'customer' => function ($self) {
            return $self->belongsTo(\App\Models\User::class, 'user_id', 'id');
        },
        'order' => function ($self) {
            return $self->belongsTo(\Modules\Order\Entities\Order::class, 'order_id', 'id');
        }
    ]

];
