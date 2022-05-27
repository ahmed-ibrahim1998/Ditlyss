<?php

namespace Modules\Trainers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Trainer extends Model implements HasMedia
{
    use HasFactory, HasTranslations;
        use InteractsWithMedia;


    public $translatable = ['name'];

    protected $table = 'trainers';

    protected $fillable = ['name','logo','price','specialty','definition','is_active','is_featured'];

    protected $casts = ['is_active'=> 'boolean','is_featured' => 'boolean'];

    protected static function newFactory()
    {
        return \Modules\Trainers\Database\factories\TrainerFactory::new();
    }
}
