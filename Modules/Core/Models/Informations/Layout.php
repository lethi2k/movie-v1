<?php

namespace Modules\Core\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $table = 'oc_information_to_layout';
    protected $primaryKey = 'information_id';
    protected $fillable = ['store_id', 'layout_id']; //use :create, :update no use :insert
    public $timestamps = false;
}
