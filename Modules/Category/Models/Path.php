<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;

    protected $table = 'oc_category_path';
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
    public $timestamps = false;
}
