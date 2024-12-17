<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlAlias extends Model
{
    use HasFactory;

    protected $table = 'oc_url_alias';
    protected $primaryKey = 'url_alias_id';
    protected $fillable = ['query', 'keyword', 'language_id'];
    public $timestamps = false;
}
