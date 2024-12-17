<?php

namespace Modules\Layout\Repositories\Interfaces;

interface LayoutModuleRepositoryInterface
{
    public function getByLayoutId(int $layout_id);

    public function getByType(int $layout_id, string $type);

    public function updateMouleByThemeId(array $data, int $layout_id);
}
