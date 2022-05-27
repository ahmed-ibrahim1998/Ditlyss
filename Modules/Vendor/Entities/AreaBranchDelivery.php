<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AreaBranchDelivery extends Pivot
{
    use HasFactory;

    protected $table = 'area_branch_delivery';
    protected $fillable = ['branch_id', 'area_id', 'min_charge', 'delivery_fees'];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\AreaBranchDeliveryFactory::new();
    }


}
