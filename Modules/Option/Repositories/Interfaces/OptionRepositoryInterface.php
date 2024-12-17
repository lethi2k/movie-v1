<?php

namespace Modules\Option\Repositories\Interfaces;

interface OptionRepositoryInterface
{
    public function getList(array $filter, $paginate);

    public function getValueByOption(int $option_id);

    public function store(array $params);

    public function edit(int $option_id);

    public function update(array $params, int $option_id);

    public function destroy(int $option_id);
}
