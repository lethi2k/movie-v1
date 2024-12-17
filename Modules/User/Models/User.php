<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Modules\Core\Models\Location\Address;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'oc_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_group_id', 'address_id', 'username', 'gender', 'password', 'salt', 'firstname', 'birthday', 'lastname', 'email', 'phone', 'image', 'code', 'ip', 'status',
    ]; //use :create, :update no use :insert

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'user_group_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function product()
    {
        return DB::table('oc_product')->count('product_id');
    }

    public function sumProductPrice()
    {
        return DB::table('oc_product')->sum('price');
    }

    public function totalShipping()
    {
        return DB::table('oc_order_delivery')->count('order_delivery_id');
    }

}
