<?php

namespace Modules\Core\Models\Taxs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{
    use HasFactory;

    protected $table = 'oc_tax_rate';
    protected $primaryKey = 'tax_rate_id';
    protected $fillable = [
        'geo_zone_id', 'name', 'rate', 'type',
    ];

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
}
