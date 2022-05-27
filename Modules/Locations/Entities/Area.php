<?php

namespace Modules\Locations\Entities;

use App\Models\Language;
use App\Models\Translate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;
use Modules\Locations\Database\factories\AreaFactory;
use Spatie\Translatable\HasTranslations;

class Area extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'city_id', 'delivery_fees'];

    protected static function newFactory()
    {
        return AreaFactory::new();
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
