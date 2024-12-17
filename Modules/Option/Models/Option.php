<?php

namespace Modules\Option\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Option as ProductsOption;

class Option extends Model
{
    use HasFactory;

    protected $table = 'oc_option';
    protected $primaryKey = 'option_id';
    protected $fillable = ['type', 'sort_order', 'status']; //use :create, :update no use :insert

    public $timestamps = false;
    public const LIMIT_AJAX = 100;

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('status', '<>', '-1');
    }

    public function description()
    {
        return $this->belongsTo(Description::class, 'option_id', 'option_id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'option_id', 'option_id');
    }

    public function valueDescriptions()
    {
        return $this->hasMany(ValueDescription::class, 'option_id', 'option_id');
    }

    public function productsOption()
    {
        return $this->hasMany(ProductsOption::class, 'option_id', 'option_id');
    }


    /**
     * Get the value's description.
     */
    // public function valueDescriptions()
    // {
    //     return $this->hasOneThrough(Value::class, ValueDescription::class, 'option_value_id', 'option_value_id', 'option_id', 'option_id');
    // }
}
