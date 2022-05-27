<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'translateable_type',
        'translateable_id',
        'language_id'
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function translateable(): MorphTo
    {
        return $this->morphTo();
    }

}
