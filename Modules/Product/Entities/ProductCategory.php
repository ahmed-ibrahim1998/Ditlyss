<?php

namespace Modules\Product\Entities;

use App\Models\Language;
use App\Models\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductCategoryFactory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'ordering', 'is_active','is_featured'];

    protected $casts = ['is_active' => 'boolean','is_featured' => 'boolean'];

    protected static function newFactory(): ProductCategoryFactory
    {
        return new ProductCategoryFactory();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product-category')->singleFile();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }

}
