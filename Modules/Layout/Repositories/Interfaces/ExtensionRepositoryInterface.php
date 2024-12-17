<?php

namespace Modules\Layout\Repositories\Interfaces;

interface ExtensionRepositoryInterface
{
    public function getByType($type);

    public function initModule($type, $extension_id);
}
