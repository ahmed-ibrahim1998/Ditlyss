<?php

namespace Modules\Client\Entities;

use App\Models\User;
use Modules\Locations\Entities\Area;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientAddress extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    public $translatable = ['title'];

    protected $table = 'clients_addresses';

    protected $fillable = [
        'client_id','area_id', 'phone', 'block', 'avenue', 'street', 'building', 'floor', 'flat', 'details', 'title'
    ];

    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function area() : BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

}
