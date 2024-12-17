<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_product_description';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id', 'language_id', 'name', 'description', 'description_short', 'tag', 'meta_title',
        'meta_description', 'meta_keyword',
    ]; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
