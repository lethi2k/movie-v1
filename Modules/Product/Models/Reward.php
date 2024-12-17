<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $table = 'oc_product_reward';
    protected $primaryKey = 'product_reward_id';
    protected $fillable = ['product_id', 'customer_group_id', 'points']; //use :create, :update no use :insert
    public $timestamps = false;
    public const LIMIT_AJAX = 100;
}
