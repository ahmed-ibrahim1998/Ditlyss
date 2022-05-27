<?php

namespace Modules\Coupon\Entities;

use App\Models\Language;
use App\Models\Translate;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'usage_rule',
        'type',
        'free_delivery',
        'amount',
        'start_date',
        'expiration_date',
        'count',
        'uses_per_customer',
        'description',
        'min_value'
    ];

}
