<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'oc_attribute_group';
    protected $primaryKey = 'attribute_group_id';
    protected $fillable = ['sort_order', 'status']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('status', '<>', '-1');
    }

    public function description()
    {
        return $this->belongsTo(GroupDescription::class, 'attribute_group_id', 'attribute_group_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'attribute_group_id', 'attribute_group_id')->orderBy('sort_order');
    }

    public function attributeDescriptions()
    {
        return $this->hasMany(Description::class, 'attribute_group_id', 'attribute_group_id');
    }

    public function totalAttribute()
    {
        return $this->attributes()->count('attribute_group_id');
    }
}
