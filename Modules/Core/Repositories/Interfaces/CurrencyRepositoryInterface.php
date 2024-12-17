<?php

namespace Modules\Core\Repositories\Interfaces;

interface CurrencyRepositoryInterface
{
    public function getList();

    public function getCurrencyByCode($code);

    public function getCurrencyByCodeAndStoreId($code, $storeId);

    public function store($data);

    public function update($id, $data);

    public function delete($id);
}
