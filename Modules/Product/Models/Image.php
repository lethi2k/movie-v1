<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'oc_product_image';
    protected $primaryKey = 'product_image_id';
    protected $fillable = ['product_id', 'image', 'sort_order']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
