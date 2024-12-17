<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_attribute_description';
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['attribute_id', 'attribute_group_id', 'language_id', 'name']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
