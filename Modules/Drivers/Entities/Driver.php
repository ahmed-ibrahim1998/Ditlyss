<?php

namespace Modules\Drivers\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user', 'lat', 'long', 'subs_type', 'subs_value', 'vehicle', 'civil_id', 'avatar'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActive()
    {
        return $this->status == 1 ? 'Active' : 'Not Active';
    }

    public function getActiveClass()
    {
        return $this->status == 1 ? 'badge-success' : 'badge-danger';
    }
}
