<?php

namespace Modules\User\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getList(array $filter, int $paginate);

    public function create(array $params);

    public function edit(int $id);

    public function update(array $params, int $id);

    public function destroy(int $id);

    public function getByEmail(string $email);

    public function getByUsername(string $username);

    public function getUserByCode(string $code);

    public function getByToken(string $token);

    public function findByField(string $field, string $value);

    public function getUserGroups(array $filter, int $paginate);
}
