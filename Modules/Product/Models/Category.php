<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Models\Category as CategoriesCategory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'oc_product_to_category';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'category_id']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
    public const LIST_ALL = 'all';

    public function category()
    {
        return $this->hasOne(CategoriesCategory::class, 'category_id', 'category_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
