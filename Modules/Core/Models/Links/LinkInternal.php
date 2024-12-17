<?php

namespace Modules\Core\Models\Links;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkInternal extends Model
{
    use HasFactory;

    protected $table = 'oc_link_internal';
    protected $primaryKey = 'link_internal_id';
    protected $fillable = ['route']; //use :create, :update no use :insert
    public $timestamps = false;

    public function description()
    {
        return $this->belongsTo(LinkInternalDescription::class, 'link_internal_id', 'link_internal_id');
    }
}
