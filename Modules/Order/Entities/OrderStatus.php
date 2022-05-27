<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'order_statuses';
    protected $translatable = ['name'];
    protected $fillable = ['name', 'color'];


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'status_id', 'id');
    }
}
