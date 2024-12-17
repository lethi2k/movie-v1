<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{
    use HasFactory;

    protected $table = 'oc_tax_rate_to_customer_group';
    protected $primaryKey = 'tax_rate_id';
    protected $fillable = ['tax_rate_id', 'customer_group_id'];
    public $timestamps = false;
}
