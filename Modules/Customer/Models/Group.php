<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'oc_customer_group';
    protected $primaryKey = 'customer_group_id';
    protected $fillable = ['approval', 'sort_order', 'type_price', 'discount_percent', 'payment']; //use :create, :update no use :insert
    public $timestamps = false;

    public function description()
    {
        return $this->belongsTo(GroupDescription::class, 'customer_group_id', 'customer_group_id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'customer_group_id', 'customer_group_id');
    }

    public function totalCustomer()
    {
        return $this->customer()->count();
    }

    public function taxRate()
    {
        return $this->hasOne(TaxRate::class, 'customer_group_id', 'customer_group_id');
    }
}
