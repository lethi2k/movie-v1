<?php

namespace Modules\Manufacturer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Product;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'oc_manufacturer';
    protected $primaryKey = 'manufacturer_id';
    protected $fillable = ['name', 'image', 'status', 'sort_order']; //use :create, :update no use :insert
    public $timestamps = false;

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('status', '<>', '-1');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'manufacturer_id', 'manufacturer_id');
    }
}
