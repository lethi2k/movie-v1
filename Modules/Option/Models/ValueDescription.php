<?php

namespace Modules\Option\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_option_value_description';
    protected $primaryKey = 'option_value_id';
    protected $fillable = ['option_value_id', 'language_id', 'option_id', 'name']; //use :create, :update no use :insert

    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
