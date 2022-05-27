<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Vendor\Database\Factories\ConsultationPackageFactory;
use Spatie\Translatable\HasTranslations;

class ConsultationPackage extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'consultation_packages';

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'price',
        'vendor_id'
    ];


    protected static function newFactory(): ConsultationPackageFactory
    {
        return ConsultationPackageFactory::new();
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function packageAttributes(): HasMany
    {
        return $this->hasMany(ConsultationPackageAttribute::class, 'package_id', 'id');
    }
}
