<?php

namespace Modules\Layout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $table = 'oc_layout';
    protected $primaryKey = 'layout_id';
    protected $fillable = ['name']; //use :create, :update no use :insert
    public $timestamps = false;
}
