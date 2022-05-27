<?php


use App\Models\User;
use Modules\Locations\Entities\Area;
use Modules\Product\Entities\Product;
use Modules\Vendor\Entities\AreaBranchDelivery;
use Modules\Vendor\Entities\Branch;
use Modules\Vendor\Entities\Category;
use Modules\Vendor\Entities\CategoryVendor;
use Modules\Vendor\Entities\VendorUser;

return [
    'name' => 'Vendor',
    'vendor' => [
        'relations' => [
            'users' => static fn($self) => $self->belongsToMany(User::class, 'vendor_user')->withTimestamps()->withPivot('branch_id')->using(VendorUser::class),
            'products' => static fn($self) => $self->hasManyThrough(Product::class, Branch::class, 'vendor_id', 'branch_id', 'id', 'id'),
        ]
    ],
    'branch' => [
        'relations' => [
            'area' => static function ($self) {
                return $self->belongsTo(\Modules\Locations\Entities\Area::class, 'area_id', 'id');
            },
            'delivery_areas' => static function ($self) {
                return $self->belongsToMany(Area::class, 'area_branch_delivery')->withPivot('min_charge', 'delivery_fees')->withTimestamps()->using(AreaBranchDelivery::class);
            },
            'products' => static function ($self) {
                return $self->hasMany(\Modules\Product\Entities\Product::class, 'branch_id', 'id');
            }
        ]
    ]

];
