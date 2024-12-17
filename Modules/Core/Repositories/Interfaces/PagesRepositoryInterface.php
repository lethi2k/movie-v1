<?php

namespace Modules\Core\Repositories\Interfaces;

interface PagesRepositoryInterface
{
    public function getList(array $filter, $paginate);

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);
}
