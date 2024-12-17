<?php

namespace Modules\Layout\Repositories\Interfaces;

interface LayoutRepositoryInterface
{
    public function getList(array $filter, int $paginate);
}
