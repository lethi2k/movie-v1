<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    //connection to oc_news_to_store table
    protected $table = 'oc_news_to_store';
    protected $primaryKey = 'news_id';
    protected $fillable = ['news_id', 'store_id']; //use :create, :update no use :insert

    public $timestamps = false;
}
