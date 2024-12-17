<?php

namespace Modules\Core\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'oc_information_to_store';
    protected $primaryKey = 'information_id';
    protected $fillable = ['store_id']; //use :create, :update no use :insert
    public $timestamps = false;
}
