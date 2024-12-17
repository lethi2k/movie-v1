<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'oc_news_to_download';
    protected $primaryKey = 'news_id';
    protected $fillable = ['news_id', 'download_id']; //use :create, :update no use :insert

    public $timestamps = false;
}
