<?php

namespace Modules\Vendor\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Entities\Product;
use Modules\Vendor\Database\factories\VendorFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Vendor extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = ['name'];
    protected $fillable = ['name', 'is_active', 'is_featured' ,'ordering', 'phone', 'address', 'commission'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    protected static function newFactory()
    {
        return VendorFactory::new();
    }

    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('vendor.vendor.relations')) ? config('vendor.vendor.relations')[$method]($this) : parent::__call($method, $parameters);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_vendor')->withTimestamps()->using(CategoryVendor::class);
    }



    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'payment_vendor', 'vendor_id', 'payment_method_id')->using(PaymentVendor::class)->withTimestamps();
    }

}
