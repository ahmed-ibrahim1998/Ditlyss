<?php

namespace App\Models;

use App\Traits\HasOrders;
use Laravel\Sanctum\HasApiTokens;
use Modules\Order\Entities\Order;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Modules\Client\Entities\ClientAddress;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRolesAndAbilities;
    use InteractsWithMedia;
    use HasOrders;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_photo_path',
        'gender',
        'account_type',
        'country_id',
        'account_status',
        'credit',
        'activation_code',
        'whatsapp_number',
        'loyalty_points',
        'provider',
        'provider_id',
        'age',
        'height',
        'weight',
        'physical_activity',
        'notes',
    ];

    protected $roleBackground = [
        'admin' => 'bg-info',
        'driver' => 'bg-success',
        'vendor' => 'bg-primary',
        'client' => 'bg-danger'
    ];


    public function getRoleBackground($roleName)
    {
        return $this->roleBackground[$roleName] ?? 'bg-warning';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function setPasswordAttribute($value): void
    {
        if ($value) {
            $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    public function __call($method, $parameters)
    {
        return array_key_exists($method, config('user-model-relations')) ? config('user-model-relations')[$method]($this) : parent::__call($method, $parameters);
    }

    public function scopeFilter($query, $data)
    {
        // Filter with from date only
        if (isset($data['from']) && !isset($data['to'])) {
            $query = $query->whereDate('created_at', '>=', $data['from']);
        }

        // Filter with to date only
        if (isset($data['to']) && !isset($data['from'])) {
            $query = $query->whereDate('created_at', '<=', $data['to']);
        }

        // Filter between two dates
        if (isset($data['to']) && isset($data['from'])) {
            $query = $query->whereBetween('created_at', [$data['from'], $data['to']]);
        }

        // Filter with name or email
        if (isset($data['name-or-email'])) {
            $query = $query->where('name', 'LIKE', '%' . $data['name-or-email'] . '%')->orWhere('email', 'LIKE', '%' . $data['name-or-email'] . '%');
        }

        // Filter with id
        if (isset($data['id'])) {
            $query = $query->whereId($data['id']);
        }

        // Filter with Role name
        if (isset($data['role-name'])) {
            $query = $query->whereHas('roles', function ($query) use ($data) {
                $query->whereName($data['role-name']);
            });
        }

        return $query;
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(ClientAddress::class, 'client_id', 'id');
    }

}
