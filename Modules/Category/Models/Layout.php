<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $table = 'oc_category_to_layout';
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
}
