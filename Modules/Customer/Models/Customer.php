<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Core\Models\Location\Address;

class Customer extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'oc_customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_group_id', 'store_id', 'language_id', 'name', 'email', 'telephone', 'fax', 'password',
        'newsletter', 'custom_field', 'ip', 'status', 'approved', 'safe', 'token', 'code', 'note', 'gender', 'birthday',
    ]; //use :create, :update no use :insert

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';

    public function address()
    {
        return $this->hasMany(Address::class, 'customer_id', 'customer_id');
    }

    public function isActive()
    {
        $count = $this->hasMany(Address::class, 'customer_id', 'customer_id')->where('is_active', 1)->count();

        return $count > 0 ? true : false;
    }

    public function isPickup()
    {
        $count = $this->hasMany(Address::class, 'customer_id', 'customer_id')->where('is_pickup', 1)->count();

        return $count > 0 ? true : false;
    }

    public function isReturn()
    {
        $count = $this->hasMany(Address::class, 'customer_id', 'customer_id')->where('is_return', 1)->count();

        return $count > 0 ? true : false;
    }

    public function addressActive()
    {
        return $this->hasOne(Address::class, 'customer_id', 'customer_id')->where('is_active', 1);
    }

    public function group()
    {
        return $this->belongsTo(GroupDescription::class, 'customer_group_id', 'customer_group_id');
    }
}
