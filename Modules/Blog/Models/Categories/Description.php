<?php

namespace Modules\Blog\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_cat_news_description';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_id', 'language_id', 'name', 'description', 'meta_title', 'meta_description', 'meta_keyword']; //use :create, :update no use :insert

    public $timestamps = false;
}
