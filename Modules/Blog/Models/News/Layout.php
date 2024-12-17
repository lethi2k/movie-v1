<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLayout extends Model
{
    use HasFactory;

    protected $table = 'oc_news_to_layout';
    protected $primaryKey = 'news_id';
    protected $fillable = ['news_id', 'store_id', 'layout_id']; //use :create, :update no use :insert

    public $timestamps = false;
}
