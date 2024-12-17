<?php

namespace Modules\Product\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getList(array $filter, $paginate);

    public function getProductVariant(int $parent_id);

    public function store(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $product_id);
}
