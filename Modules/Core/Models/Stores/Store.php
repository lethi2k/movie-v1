<?php

namespace Modules\Core\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Location\Address;

class Store extends Model
{
    use HasFactory;

    protected $table = 'oc_store';
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'url', 'ssl', 'address_id', 'logo', 'code', 'locale_code',
        'icon', 'user_id', 'email', 'telephone', 'fax', 'image', 'is_active',
    ];
    public $timestamps = false;

    public function description()
    {
        return $this->belongsTo(Description::class, 'store_id', 'store_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }
}
