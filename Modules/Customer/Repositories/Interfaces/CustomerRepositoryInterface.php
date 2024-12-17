<?php

namespace Modules\Customer\Repositories\Interfaces;

interface CustomerRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function address(array $params, int $id);

    public function destroy(int $id);

    public function destroyAddress(int $id);
}
