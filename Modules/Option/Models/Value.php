<?php

namespace Modules\Option\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'oc_option_value';
    protected $primaryKey = 'option_value_id';
    protected $fillable = ['option_id', 'image', 'sort_order']; //use :create, :update no use :insert

    public $timestamps = false;
    public const LIMIT_AJAX = 100;

    public function description()
    {
        return $this->belongsTo(ValueDescription::class, 'option_value_id', 'option_value_id');
    }
}
