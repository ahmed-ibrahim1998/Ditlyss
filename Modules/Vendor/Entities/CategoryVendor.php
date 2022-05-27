<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryVendor extends Pivot
{
    use HasFactory;

    protected $table = 'category_vendor';
    protected $fillable = ['category_id', 'vendor_id'];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\CategoryVendorFactory::new();
    }
}
