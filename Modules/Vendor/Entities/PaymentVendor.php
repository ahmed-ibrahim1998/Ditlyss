<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PaymentVendor extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $fillable = ['payment_method_id', 'vendor_id'];
    public $timestamps = true;

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\PaymentVendorFactory::new();
    }


}
