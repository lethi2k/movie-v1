<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_attribute_group_description';
    protected $primaryKey = 'attribute_group_id';
    protected $fillable = ['attribute_group_id', 'language_id', 'name']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
