<?php

namespace Modules\Attribute\Repositories\Interfaces;

interface AttributeRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function getListAttr(array $filter, int $paginate);

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);
}
