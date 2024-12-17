<?php

namespace Modules\Core\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'oc_country';
    protected $primaryKey = 'country_id';
    protected $fillable = ['name', 'iso_code_2', 'iso_code_3', 'postcode_required', 'status']; //use :create, :update no use :insert
    public $timestamps = false;
}
