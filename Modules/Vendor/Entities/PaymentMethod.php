<?php

namespace Modules\Vendor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class   PaymentMethod extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'payment_methods';
    protected $fillable = [
        'name',
        'extra_fee',
        'fee_type',
        'is_active',
    ];
    protected $translatable = ['name'];

    protected static function newFactory()
    {
        return \Modules\Vendor\Database\factories\PaymentMethodFactory::new();
    }


}
