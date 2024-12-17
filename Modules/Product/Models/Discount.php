<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'oc_product_discount';
    protected $primaryKey = 'product_discount_id';
    protected $fillable = ['product_id', 'customer_group_id', 'quantity', 'priority', 'price']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
