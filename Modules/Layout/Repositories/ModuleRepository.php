<?php

namespace Modules\Layout\Repositories;

use Modules\Layout\Models\Module;
use Modules\Layout\Repositories\Interfaces\ModuleRepositoryInterface;

class ModuleRepository implements ModuleRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function getList(array $filter, int $paginate)
    {
        return Module::paginate($paginate);
    }

    public function create(array $data, string $type)
    {
        unset($data['_token']);
        $module = new Module();
        $module->name = $data['name'];
        $module->code = $type;
        $module->setting = json_encode($data);
        $module->save();

        return $module;
    }

    public function detail(int $id)
    {
        return Module::findOrFail($id);
    }

    public function getModulesByCode($code)
    {
        return Module::where('code', $code)->get();
    }

    public function update(array $data, string $type, int $id)
    {
        unset($data['_token']);
        $module = Module::findOrFail($id);
        $module->name = $data['name'];
        $module->code = $type;
        $module->setting = json_encode($data);
        $module->save();
    }

    public function destroy(int $id)
    {
        Module::findOrFail($id)->delete();
        ;
    }
}
