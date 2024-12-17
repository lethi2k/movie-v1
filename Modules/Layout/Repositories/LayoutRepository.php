<?php

namespace Modules\Layout\Repositories;

use Modules\Layout\Models\Layout;
use Modules\Layout\Repositories\Interfaces\LayoutRepositoryInterface;

class LayoutRepository implements LayoutRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function getList(array $filter, int $paginate)
    {
        return Layout::paginate($paginate);
    }
}
