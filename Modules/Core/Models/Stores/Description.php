<?php

namespace Modules\Core\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_store_description';
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'store_id', 'language_id', 'name', 'introduction', 'operating_time',
        'comment', 'url_map', 'meta_title', 'meta_description', 'code_header', 'code_footer',
    ];

    public $timestamps = false;
}
