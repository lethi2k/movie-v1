<?php

namespace Modules\Core\Repositories;

use Modules\Core\Eloquent\Repository;
use Modules\Core\Repositories\Interfaces\LocaleRepositoryInterface;

class LocaleRepository extends Repository implements LocaleRepositoryInterface
{
    /**
     * @return string
     *  Return the model interface
     */
    public function model()
    {
        return 'Modules\Core\Models\Locale';
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function getLocaleByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    public function store($data)
    {
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->model->insert($data);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->model->where('locale_id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->model->where('locale_id', $id)->delete();
    }
}
