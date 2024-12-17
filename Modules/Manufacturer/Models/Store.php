<?php

namespace Modules\Manufacturer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'oc_manufacturer_to_store';
    protected $primaryKey = 'manufacturer_id';
    protected $fillable = ['manufacturer_id', 'store_id']; //use :create, :update no use :insert
    public $timestamps = false;
}
