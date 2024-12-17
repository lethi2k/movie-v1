<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_category_description';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id', 'language_id', 'name',
        'description', 'meta_title', 'meta_description',
        'custom_title', 'seo_url',
    ]; //use :create, :update no use :insert

    public $timestamps = false;
}
