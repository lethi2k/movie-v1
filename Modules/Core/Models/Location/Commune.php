<?php

namespace Modules\Core\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $table = 'oc_commune';
    protected $primaryKey = 'commune_id';
    protected $fillable = ['commune_id', 'district_id', 'name']; //use :create, :update no use :insert
    public $timestamps = false;
}
