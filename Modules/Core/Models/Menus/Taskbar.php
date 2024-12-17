<?php

namespace Modules\Core\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskbar extends Model
{
    use HasFactory;

    protected $table = 'oc_taskbar';
    protected $primaryKey = 'taskbar_id';
    protected $fillable = ['taskbar_group_id', 'name_id', 'router_name', 'taskbar_type_id', 'parent_id', 'image', 'column', 'sort_order', 'status', 'store_id']; //use :create, :update no use :insert
    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';

    /**
     * @var array[]
     */
    public const TYPES = [
        [
            'taskbar_type_id' => 1,
            'name' => 'Danh mục Sản phẩm',
            'route' => 'cat_product',
            'sort_order' => 0,
            'status' => 1,
        ],

        [
            'taskbar_type_id' => 2,
            'name' => 'Sản phẩm',
            'route' => 'product',
            'sort_order' => 1,
            'status' => 1,
        ],

        [
            'taskbar_type_id' => 3,
            'name' => 'Danh mục Tin tức',
            'route' => 'cat_news',
            'sort_order' => 2,
            'status' => 1,
        ],

        [
            'taskbar_type_id' => 4,
            'name' => 'Tin tức',
            'route' => 'news',
            'sort_order' => 3,
            'status' => 1,
        ],
        [
            'taskbar_type_id' => 7,
            'name' => 'Trang Thông tin',
            'route' => 'information',
            'sort_order' => 6,
            'status' => 1,
        ],
        // array(
        //     'taskbar_type_id' => 8,
        //     'name' => 'Video',
        //     'route' => 'video',
        //     'sort_order' => 4,
        //     'status' => 1
        // ),
        [
            'taskbar_type_id' => 5,
            'name' => 'Trang tĩnh',
            'route' => 'internal',
            'sort_order' => 0,
            'status' => 1,
        ],
        [
            'taskbar_type_id' => 6,
            'name' => 'Liên kết ngoài',
            'route' => 'external',
            'sort_order' => 5,
            'status' => 1,
        ],
    ];

    public function description()
    {
        return $this->belongsTo(TaskbarDescription::class, 'taskbar_id', 'taskbar_id');
    }

    public function childs()
    {
        return $this->hasMany(Taskbar::class, 'parent_id', 'taskbar_id');
    }

    public function group()
    {
        return $this->hasOne(TaskbarGroup::class, 'taskbar_group_id', 'taskbar_group_id');
    }
}
