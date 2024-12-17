<?php

namespace Modules\Core\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'oc_district';
    protected $primaryKey = 'district_id';
    protected $fillable = ['district_id', 'province_id', 'name']; //use :create, :update no use :insert
    public $timestamps = false;
}
