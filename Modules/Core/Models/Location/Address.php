<?php

namespace Modules\Core\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'oc_address';
    protected $primaryKey = 'address_id';
    protected $fillable = ['customer_id', 'postcode', 'country_id', 'province_id', 'custom_field', 'district_id', 'commune_id', 'address', 'is_active', 'is_pickup', 'is_return']; //use :create, :update no use :insert
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'commune_id');
    }
}
