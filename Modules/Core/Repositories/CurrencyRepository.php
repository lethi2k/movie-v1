<?php

namespace Modules\Core\Repositories;

use Modules\Core\Eloquent\Repository;
use Modules\Core\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository extends Repository implements CurrencyRepositoryInterface
{
    /**
     * @return string
     *  Return the model interface
     */
    public function model()
    {
        return 'Modules\Core\Models\Currency';
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function getCurrencyByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    public function getCurrencyByCodeAndStoreId($code, $storeId)
    {
        return $this->model->where('code', $code)->where('store_id', $storeId)->first();
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
        $this->model->where('currency_id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->model->where('currency_id', $id)->delete();
    }
}
