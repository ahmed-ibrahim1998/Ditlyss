<?php

namespace Modules\Drivers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Drivers\Database\factories\VehicleFactory::new();
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }


}
