<?php

namespace Modules\Vendor\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Vendor\Database\factories\VendorUserFactory;
use Modules\Vendor\Http\Controllers\BranchController;

class VendorUser extends Pivot
{
    use HasFactory;

    protected $table = 'vendor_user';
    protected $fillable = [];

    protected $with = ['branch', 'vendor', 'user'];

    protected static function newFactory()
    {
        return VendorUserFactory::new();
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
