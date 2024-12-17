<?php

namespace Modules\Core\Models\Taxs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxClass extends Model
{
    use HasFactory;

    protected $table = 'oc_tax_class';
    protected $primaryKey = 'tax_class_id';
    protected $fillable = [
        'title', 'description',
    ];

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
}
