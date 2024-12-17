<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'oc_news_image';
    protected $primaryKey = 'news_image_id';
    protected $fillable = ['news_id', 'image', 'sort_order']; //use :create, :update no use :insert

    public $timestamps = false;
}
