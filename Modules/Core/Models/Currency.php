<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'oc_currency';
    protected $primaryKey = 'currency_id';
    protected $fillable = ['title', 'code', 'symbol_left', 'symbol_right', 'decimal_place', 'value', 'status'];
    public $timestamps = false;
}
