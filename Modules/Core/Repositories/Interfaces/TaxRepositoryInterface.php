<?php

namespace Modules\Core\Repositories\Interfaces;

interface TaxRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function store(array $params);

    public function detail($tax_rule_id);

    public function update(array $params, int $tax_rule_id);

    public function destroy(int $tax_rule_id);
}
