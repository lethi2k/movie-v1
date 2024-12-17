<?php

namespace Modules\Core\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'oc_province';
    protected $primaryKey = 'province_id';
    protected $fillable = ['province_id', 'country_id', 'name']; //use :create, :update no use :insert
    public $timestamps = false;
}
