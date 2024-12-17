<?php

namespace Modules\Layout\Repositories\Interfaces;

interface ModuleRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function detail(int $id);

    public function create(array $data, string $type);

    public function getModulesByCode(string $code);

    public function update(array $data, string $type, int $id);

    public function destroy(int $id);
}
