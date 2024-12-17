<?php

namespace Modules\Core\Repositories\Interfaces;

interface MenusRepositoryInterface
{
    public function getList(array $filter, $paginate);

    public function getByGroup(array $filter, $paginate);

    public function store(array $params);

    public function storeGroup(array $params);

    public function edit(int $id);

    public function getTaskbar(int $taskbar_id);

    public function update(array $params, int $id);

    public function updateGroup(array $params, int $id);

    public function destroy(int $id);

    public function getTaskbarTypes(array $data = [], bool $status = false);

    public function getTaskbarInfo(int $taskbar_id, int $taskbar_type_id, int $name_id);
}
