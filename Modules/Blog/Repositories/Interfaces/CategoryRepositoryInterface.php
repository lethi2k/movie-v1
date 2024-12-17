<?php

namespace Modules\Blog\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function getByCateId(int $id, int $paginate);

    public function detail(int $id);

    public function edit(int $id);

    public function search(array $params);

    public function getParent(int $id);

    public function store(array $params);

    public function update(array $params, int $id);

    public function destroy(int $id);

    public function changeStatus(int $id, $status);
}
