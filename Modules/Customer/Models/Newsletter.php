<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'oc_newsletter_data';
    protected $primaryKey = 'newsletter_data_id';
    protected $fillable = ['email', 'value', 'ip', 'viewed']; //use :create, :update no use :insert
    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
}
