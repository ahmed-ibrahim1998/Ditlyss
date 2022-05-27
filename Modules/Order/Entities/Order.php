<?php

namespace Modules\Order\Entities;

use App\Classes\ExtendsEloquentModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Product\Entities\Product;


class Order extends ExtendsEloquentModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'area_id', 'client_id', 'driver_id', 'coupon_id', 'subtotal',
        'delivery_fees', 'discount', 'total', 'status', 'prepared_at',
        'handed_at', 'delivered_at', 'payment_url', 'branch_id','address',
    ];

    protected $with = ['status', 'products'];


    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('order.relations.order')) ? config('order.relations.order')[$method]($this) : parent::__call($method, $parameters);
    }

    protected static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
