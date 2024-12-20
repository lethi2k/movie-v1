<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Tag as ModelsTag;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'oc_product_tag';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'tag_id'];
    public $timestamps = false;

    public function info()
    {
        return $this->hasOne(ModelsTag::class, 'tag_id', 'tag_id');
    }
}
