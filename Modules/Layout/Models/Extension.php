<?php

namespace Modules\Layout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    protected $table = 'oc_extension';
    protected $primaryKey = 'extension_id';
    protected $fillable = ['type', 'code']; //use :create, :update no use :insert
    public $timestamps = false;
}
