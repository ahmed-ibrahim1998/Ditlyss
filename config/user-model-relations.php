<?php

return [
    'orders' => function ($self) {
        return $self->hasMany(\Modules\Order\Entities\Order::class, 'client_id', 'id');
    }
];
