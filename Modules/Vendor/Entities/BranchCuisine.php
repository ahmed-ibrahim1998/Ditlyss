<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BranchCuisine extends Pivot
{
    use HasFactory;

    protected $table = 'branch_cuisine';
    protected $fillable = ['branch_id', 'cuisine_id'];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\BranchCuisineFactory::new();
    }

}
