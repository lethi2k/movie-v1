<?php

namespace Modules\Layout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutModule extends Model
{
    use HasFactory;

    protected $table = 'oc_layout_module';
    protected $primaryKey = 'layout_module_id';
    protected $fillable = ['layout_id', 'code', 'position', 'sort_order']; //use :create, :update no use :insert
    public $timestamps = false;

    public function module()
    {
        $code = explode('.', $this->code);

        return Module::where('module_id', $code[1])->first();
    }
}
