<?php

namespace Modules\Layout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutRoute extends Model
{
    use HasFactory;

    protected $table = 'oc_layout_route';
    protected $primaryKey = 'layout_route_id';
    protected $fillable = ['layout_id', 'store_id', 'route']; //use :create, :update no use :insert
    public $timestamps = false;
}
