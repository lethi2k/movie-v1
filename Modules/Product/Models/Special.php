<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    protected $table = 'oc_product_special';
    protected $primaryKey = 'product_special_id';
    protected $fillable = ['product_id', 'customer_group_id', 'priority', 'price']; //use :create, :update no use :insert
    public $timestamps = true;

    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';

    public const LIMIT_AJAX = 100;
}
