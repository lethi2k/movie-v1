<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $table = 'oc_category_filter';
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
    public $timestamps = false;
}
