<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'oc_user_group';
    protected $primaryKey = 'user_group_id';
    protected $fillable = [
        'name', 'permission',
    ];

    public $timestamps = false;
}
