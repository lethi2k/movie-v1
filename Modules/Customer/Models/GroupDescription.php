<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDescription extends Model
{
    use HasFactory;

    protected $table = 'oc_customer_group_description';
    protected $primaryKey = 'customer_group_id';
    protected $fillable = ['customer_group_id', 'language_id', 'name', 'description']; //use :create, :update no use :insert
    public $timestamps = false;
}
