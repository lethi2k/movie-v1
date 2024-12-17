<?php

namespace Modules\Blog\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'oc_cat_news_to_store';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_id', 'store_id']; //use :create, :update no use :insert

    public $timestamps = false;
}
