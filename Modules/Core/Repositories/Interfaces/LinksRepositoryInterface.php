<?php

namespace Modules\Core\Repositories\Interfaces;

interface LinksRepositoryInterface
{
    public function getList($filter, $paginate);

    public function edit($id);
}
