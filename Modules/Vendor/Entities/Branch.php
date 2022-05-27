<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Locations\Entities\Area;
use Modules\Vendor\Database\factories\BranchFactory;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'vendor_id',
        'area_id',
        'status',
        'is_active',
        'lat',
        'long',
        'address',
        'is_featured',
        'delivery_time',
        'description'
    ];

    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('vendor.branch.relations')) ? config('vendor.branch.relations')[$method]($this) : parent::__call($method, $parameters);
    }

    protected static function newFactory()
    {
        return BranchFactory::new();
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function cuisines(): BelongsToMany
    {
        return $this->belongsToMany(Cuisine::class)->withTimestamps()->using(BranchCuisine::class);
    }

}
