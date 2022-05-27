<?php

namespace Modules\Slides\Entities;

use App\Models\User;
use App\Models\Language;
use App\Models\Translate;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia
    ;

    protected $fillable = [
        'created_by',
        'button_link'
    ];
    
    public function translates() : MorphMany
    {
        return $this->morphMany(Translate::class, 'translateable');
    }

    public function getTranslatedField($field)
    {
        $language = Language::where('prefix', app()->getLocale())->first();
        return $this->translates()->where('key', $field)->where('language_id', $language->id)->first()->value;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    
}
