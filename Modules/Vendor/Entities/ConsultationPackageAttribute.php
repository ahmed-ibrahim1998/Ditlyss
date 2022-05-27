<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ConsultationPackageAttribute extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ["name", "type", "package_id"];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\ConsultationPackageAttributeFactory::new();
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ConsultationPackage::class, 'package_id', 'id');
    }
}
