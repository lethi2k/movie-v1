<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_news_description';
    protected $primaryKey = 'news_id';
    protected $fillable = ['news_id', 'language_id', 'name', 'description', 'description_short', 'tag', 'meta_title', 'meta_description', 'meta_keyword']; //use :create, :update no use :insert

    public $timestamps = false;
}
