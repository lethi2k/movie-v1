<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Links\LinkInternal;
use Modules\Core\Repositories\Interfaces\LinksRepositoryInterface;

class LinksRepository implements LinksRepositoryInterface
{
    public function getList($filter, $paginate)
    {
        $query = LinkInternal::with('description');

        return $query->paginate($paginate);
    }

    public function edit($id)
    {
        $query = LinkInternal::with('description')->where('id', $id);

        return $query->first();
    }
}
