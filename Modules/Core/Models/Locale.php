<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $table = 'oc_language';
    protected $primaryKey = 'language_id';
    protected $fillable = ['name', 'code', 'locale', 'image', 'directory', 'sort_order', 'status'];
    public $timestamps = false;
}
