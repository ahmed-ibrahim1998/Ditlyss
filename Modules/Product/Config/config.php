<?php

use App\Models\Translate;
use Modules\Product\Models\ProductCategory;

return [
    'name' => 'Product',
    'relations' => [
        'branch' => static function ($self) {
            $self->belongsTo(\Modules\Vendor\Entities\Branch::class, 'branch_id', 'id');
        },
    ]
];
