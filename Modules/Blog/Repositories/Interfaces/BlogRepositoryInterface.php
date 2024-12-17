<?php

namespace Modules\Blog\Repositories\Interfaces;

interface BlogRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function edit(int $id);

    public function store(array $params);

    public function update(array $params, int $id);

    public function destroy(int $id);

    public function changeStatus(int $id, $status);
}
