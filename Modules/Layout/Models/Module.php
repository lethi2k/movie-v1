<?php

namespace Modules\Layout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'oc_module';
    protected $primaryKey = 'module_id';
    protected $fillable = ['name', 'code', 'setting']; //use :create, :update no use :insert
    public $timestamps = false;
}
