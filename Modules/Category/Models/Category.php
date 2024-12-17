<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Category as ProductCategory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'oc_category';
    protected $primaryKey = 'category_id';
    protected $fillable = ['parent_id', 'image', 'sort_order', 'status']; //use :create, :update no use :insert

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

    public function filter()
    {
        return $this->belongsTo(Filter::class, 'category_id', 'category_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class, 'category_id', 'category_id');
    }

    public function path()
    {
        return $this->belongsTo(Path::class, 'category_id', 'category_id');
    }

    public function related()
    {
        return $this->belongsTo(Related::class, 'category_id', 'category_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'category_id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(ProductCategory::class, 'category_id', 'category_id');
    }

    public function product_ids()
    {
        return $this->products->pluck('product_id')->toArray();
    }
}
