<?php

namespace Modules\Manufacturer\Repositories\Interfaces;

interface ManufacturerRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);
}
