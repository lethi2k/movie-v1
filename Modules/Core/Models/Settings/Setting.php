<?php

namespace Modules\Core\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'oc_setting';
    protected $primaryKey = 'setting_id';
    protected $fillable = [
        'store_id', 'code', 'key', 'value', 'serialized',
    ];

    public $timestamps = false;
}
