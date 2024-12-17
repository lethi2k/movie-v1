<?php

namespace Modules\Core\Models\Taxs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRule extends Model
{
    use HasFactory;

    protected $table = 'oc_tax_rule';
    protected $primaryKey = 'tax_rule_id';
    protected $fillable = [
        'tax_class_id', 'tax_rate_id', 'based', 'priority',
    ];

    public $timestamps = false;

    public function taxClass()
    {
        return $this->belongsTo(TaxClass::class, 'tax_class_id');
    }

    public function taxRate()
    {
        return $this->belongsTo(TaxRate::class, 'tax_rate_id');
    }
}
