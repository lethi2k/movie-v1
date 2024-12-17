<?php

namespace Modules\Core\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskbarGroup extends Model
{
    use HasFactory;

    protected $table = 'oc_taskbar_group';
    protected $primaryKey = 'taskbar_group_id';
    protected $fillable = ['sort_order']; //use :create, :update no use :insert
    public $timestamps = false;

    public function taskbars()
    {
        return $this->hasMany(Taskbar::class, 'taskbar_group_id', 'taskbar_group_id')->where('parent_id', 0);
    }

    public function taskbar()
    {
        $taskbar = implode(', ', $this->taskbars->where('parent_id', 0)->pluck('description.name')->toArray());

        return $taskbar;
    }

    public function description()
    {
        return $this->hasOne(TaskbarGroupDescription::class, 'taskbar_group_id', 'taskbar_group_id');
    }
}
