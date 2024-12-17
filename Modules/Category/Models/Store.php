<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'oc_category_to_store';
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
    public $timestamps = false;
}
