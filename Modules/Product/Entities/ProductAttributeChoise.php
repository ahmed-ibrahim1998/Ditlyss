<?php

namespace Modules\Product\Entities;

use App\Models\Language;
use App\Models\Translate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductAttributeChoicesFactory;
use Spatie\Translatable\HasTranslations;

class ProductAttributeChoise extends Model
{
    use HasFactory, HasTranslations;


    protected $table = 'product_attributes_choices';
    protected $fillable = ['name', 'attribute_id', 'additional_price'];

    public $translatable = ['name'];

    protected static function newFactory(): ProductAttributeChoicesFactory
    {
        return new ProductAttributeChoicesFactory();
    }


    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
