<?php

namespace Modules\Core\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskbarGroupDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_taskbar_group_description';
    protected $primaryKey = 'taskbar_group_id';
    protected $fillable = ['taskbar_group_id', 'language_id', 'name', 'description']; //use :create, :update no use :insert
    public $timestamps = false;
}
