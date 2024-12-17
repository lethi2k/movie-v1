<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Attribute\Models\Attribute as AttributesAttribute;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'oc_product_attribute';
    protected $primaryKey = 'product_attribute_id';
    protected $fillable = ['product_id', 'language_id', 'name', 'text']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
