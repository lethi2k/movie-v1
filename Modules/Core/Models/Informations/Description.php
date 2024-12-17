<?php

namespace Modules\Core\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'oc_information_description';
    protected $primaryKey = 'information_id';
    protected $fillable = ['language_id', 'title', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'custom_title']; //use :create, :update no use :insert
    public $timestamps = false;
}
