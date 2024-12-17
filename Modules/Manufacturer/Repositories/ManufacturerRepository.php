<?php

namespace Modules\Manufacturer\Repositories;

use Modules\Manufacturer\Models\Manufacturer;

//use Your Model
use Modules\Manufacturer\Models\Store;
use Modules\Manufacturer\Repositories\Interfaces\ManufacturerRepositoryInterface;

class ManufacturerRepository implements ManufacturerRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getList($filter, $paginate)
    {
        if (isset($filter['filter'])) {
            return Manufacturer::where($filter['filter']['key'], 'LIKE', '%' . $filter['filter']['value'] . '%')->paginate($paginate);
        }

        return Manufacturer::paginate($paginate);
    }

    public function store($params)
    {
        //insert data in table oc_manufacturer
        if (isset($params['manufacturer'])) {
            $params['manufacturer']['sort_order'] = 0;
            $manufacturer = Manufacturer::create($params['manufacturer']);
            $manufacturer_id = $manufacturer->manufacturer_id;
        }

        //insert data in table oc_manufacturer_to_store
        if (isset($params['manufacturer_store'])) {
            $params['manufacturer_store']['manufacturer_id'] = $manufacturer_id;
            Store::create($params['manufacturer_store']);
        }

        return $manufacturer_id;
    }

    public function edit($id)
    {
        return Manufacturer::findOrFail($id);
    }

    public function update(array $params, int $manufacturer_id)
    {
        //update data in table oc_manufacturer
        if (isset($params['manufacturer'])) {
            $manufacturer = Manufacturer::findOrFail($manufacturer_id);
            $manufacturer->update($params['manufacturer']);
        }

        //update data in table oc_manufacturer_to_store
        if (isset($params['manufacturer_store'])) {
            $params['manufacturer_store']['manufacturer_id'] = $manufacturer_id;
            $store = Store::findOrFail($manufacturer_id);
            $store->update($params['manufacturer_store']);
        }

        return $manufacturer_id;
    }

    public function destroy(int $manufacturer_id)
    {
        $manufacturer = Manufacturer::findOrFail($manufacturer_id);
        if ($manufacturer->products->count() > 0) {
            $manufacturer->update(['status' => '-1']);

            return false;
        }
        $manufacturer->delete();

        return $manufacturer_id;
    }
}
