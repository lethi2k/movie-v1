<?php

namespace Modules\Option\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_option_description';
    protected $primaryKey = 'option_id';
    protected $fillable = ['option_id', 'language_id', 'name']; //use :create, :update no use :insert

    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
