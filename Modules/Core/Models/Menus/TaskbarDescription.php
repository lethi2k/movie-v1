<?php

namespace Modules\Core\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskbarDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_taskbar_description';
    protected $primaryKey = 'taskbar_id';
    protected $fillable = ['taskbar_id', 'language_id', 'name', 'description']; //use :create, :update no use :insert
    public $timestamps = false;
}
