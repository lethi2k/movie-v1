<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'oc_product_option';
    protected $primaryKey = 'product_option_id';
    protected $fillable = ['product_id', 'value', 'episode'];
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
