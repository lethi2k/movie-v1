<?php

namespace Modules\Core\Models\Informations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'oc_information';
    protected $primaryKey = 'information_id';
    protected $fillable = ['bottom', 'sort_order', 'status']; //use :create, :update no use :insert
    public $timestamps = false;

    public function description()
    {
        return $this->hasOne(Description::class, 'information_id');
    }

    public function getDescription()
    {
        return $this->description()->where('language_id', 1)->first();
    }

    public function getDescriptionByLanguageId($languageId)
    {
        return $this->description()->where('language_id', $languageId)->first();
    }

    public function layout()
    {
        return $this->hasOne(Layout::class, 'information_id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'information_id');
    }
}
