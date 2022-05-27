<?php

namespace Modules\Product\Entities;

use App\Models\Language;
use App\Models\Translate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductAttributeFactory;
use Spatie\Translatable\HasTranslations;

class ProductAttribute extends Model
{
    use HasFactory, HasTranslations;

    public const TYPE = ['single', 'multi'];

    protected $fillable = ['product_id', 'name', 'min', 'max'];

    public $translatable = ['name'];

    protected $with = ['choices'];

    protected static function newFactory(): ProductAttributeFactory
    {
        return new ProductAttributeFactory();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function choices(): HasMany
    {
        return $this->hasMany(ProductAttributeChoise::class, 'attribute_id', 'id');
    }
}
