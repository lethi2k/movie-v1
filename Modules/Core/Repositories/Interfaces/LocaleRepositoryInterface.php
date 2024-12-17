<?php

namespace Modules\Core\Repositories\Interfaces;

interface LocaleRepositoryInterface
{
    public function getList();

    public function getLocaleByCode($code);

    public function store($data);

    public function update($id, $data);

    public function delete($id);
}
