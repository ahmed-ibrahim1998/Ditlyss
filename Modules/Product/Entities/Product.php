<?php

namespace Modules\Product\Entities;

use App\Classes\ExtendsEloquentModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Database\factories\ProductFactoryFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Product extends ExtendsEloquentModel implements HasMedia
{
    use HasFactory,
        InteractsWithMedia, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'cat_id',
        'branch_id',
        'price',
        'is_active',
        'overall_rating'
    ];


    protected $with = ['productAttributes'];
    protected $appends = ['photo'];

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', 1);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')->singleFile();
    }

    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('product.relations')) ? config('product.relations')[$method]($this) : parent::__call($method, $parameters);
    }

    protected static function newFactory(): ProductFactoryFactory
    {
        return new ProductFactoryFactory();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
    }

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    public function getPhotoAttribute(): string
    {
        return $this->getFirstMediaUrl('products');
    }


}
