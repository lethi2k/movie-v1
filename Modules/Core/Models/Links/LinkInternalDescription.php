<?php

namespace Modules\Core\Models\Links;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkInternalDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_link_internal_description';
    protected $primaryKey = 'link_internal_id';
    protected $fillable = ['name']; //use :create, :update no use :insert
    public $timestamps = false;
}
