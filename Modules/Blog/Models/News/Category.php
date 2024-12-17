<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Models\Categories\Category as CategoriesCategory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'oc_news_to_category';
    protected $primaryKey = 'news_id';
    protected $fillable = ['news_id', 'category_id']; //use :create, :update no use :insert

    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(CategoriesCategory::class, 'category_id', 'category_id');
    }
}
