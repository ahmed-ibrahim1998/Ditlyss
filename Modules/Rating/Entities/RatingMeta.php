<?php

namespace Modules\Rating\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Rating\Database\factories\RatingMetaFactory;

class RatingMeta extends Model
{
    use HasFactory;

    protected $fillable = [];



    protected static function newFactory()
    {
        return RatingMetaFactory::new();
    }

    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class, 'rating_id', 'id');
    }

}
