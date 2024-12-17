<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    use HasFactory;

    protected $table = 'oc_product_related';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'related_id']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
