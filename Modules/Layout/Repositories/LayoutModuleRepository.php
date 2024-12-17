<?php

namespace Modules\Layout\Repositories;

use Modules\Layout\Models\LayoutModule;
use Modules\Layout\Repositories\Interfaces\LayoutModuleRepositoryInterface;

class LayoutModuleRepository implements LayoutModuleRepositoryInterface
{
    public function getByLayoutId(int $layout_id)
    {
        return LayoutModule::where('layout_id', $layout_id)->orderBy('sort_order', 'asc')->get();
    }

    public function getByType(int $layout_id, string $type)
    {
        return LayoutModule::where('layout_id', $layout_id)->where('position', $type)->orderBy('sort_order', 'asc')->get();
    }

    public function updateMouleByThemeId(array $data, int $layout_id)
    {
        LayoutModule::where('layout_id', $layout_id)->delete();
        if (isset($data['layout_module']) && ! empty($data['layout_module'])) {
            $sort_order = 0;
            foreach ($data['layout_module'] as $layout_module) {
                $layout_module['layout_id'] = $layout_id;
                $layout_module['sort_order'] = $sort_order;
                LayoutModule::create($layout_module);

                $sort_order++;
            }
        }

        return $layout_id;
    }
}
