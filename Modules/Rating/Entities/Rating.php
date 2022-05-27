<?php

namespace Modules\Rating\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Modules\Rating\Database\factories\RatingFactory;

class Rating extends Model
{
    use HasFactory;


    protected $fillable = ['order_packaging', 'order_id', 'ratable_type', 'ratable_id', 'user_id', 'delivery_time', 'value_for_price', 'driver_performance', 'rate'];

    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('rating.relations')) ? config('rating.relations')[$method]($this) : parent::__call($method, $parameters);
    }

    protected static function newFactory()
    {
        return RatingFactory::new();
    }


}
