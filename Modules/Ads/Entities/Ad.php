<?php

namespace Modules\Ads\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Ads\Database\factories\AdFactory::new();
    }

    protected $casts = [
        'is_photo' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getActive(){

        return $this->is_active == 1 ? 'Active' : 'Not Active';
    }

    public function getActiveClass(){

        return $this->is_active == 1 ? 'badge-success' : 'badge-danger';
    }


}
