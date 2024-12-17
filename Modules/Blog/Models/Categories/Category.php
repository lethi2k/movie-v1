<?php

namespace Modules\Blog\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'oc_cat_news';
    protected $primaryKey = 'category_id';
    protected $fillable = ['image', 'parent_id', 'sort_order', 'status', 'view']; //use :create, :update no use :insert

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
    public const LIMIT_AJAX = 100;

    public const EXTENSIONS = [
        'all' => 'Tất cả',
        'custom' => 'Tùy chỉnh',
    ];

    public function description()
    {
        return $this->belongsTo(Description::class, 'category_id', 'category_id');
    }
}
