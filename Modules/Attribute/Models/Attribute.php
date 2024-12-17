<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Attribute as ProductsAttribute;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'oc_attribute';
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['attribute_group_id', 'sort_order']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;

    public function description()
    {
        return $this->belongsTo(Description::class, 'attribute_id', 'attribute_id');
    }

    public function products()
    {
        return $this->hasMany(ProductsAttribute::class, 'attribute_id', 'attribute_id');
    }
}
