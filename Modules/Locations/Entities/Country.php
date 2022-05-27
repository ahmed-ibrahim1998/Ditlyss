<?php

namespace Modules\Locations\Entities;

use App\Models\Language;
use App\Models\Translate;
use Modules\Locations\Entities\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'number_prefix'];

    protected static function newFactory()
    {
        return \Modules\Locations\Database\factories\CountryFactory::new();
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
