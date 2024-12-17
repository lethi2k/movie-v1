<?php

namespace Modules\Customer\Repositories\Interfaces;

interface CustomerGroupRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function store(array $params);

    public function detail(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);
}
