<?php

namespace Modules\Core\Repositories\Interfaces;

interface StoreRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function getActive();

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);
}
