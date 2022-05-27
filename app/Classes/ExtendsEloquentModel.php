<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class ExtendsEloquentModel extends Model
{
    public function newEloquentBuilder($query): EloquentBuilder
    {
        return new EloquentBuilder($query);
    }
}
