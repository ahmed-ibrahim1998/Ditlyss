<?php

namespace Modules\Vendor\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'height',
        'weight',
        'physical_activity',
        'gender',
        'additional_notes',
    ];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\ConsultationFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id','id');
    }
}
