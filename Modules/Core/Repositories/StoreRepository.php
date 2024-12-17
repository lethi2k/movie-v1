<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Location\Address;

//use model
use Modules\Core\Models\Settings\Setting;
use Modules\Core\Models\Stores\Description;
use Modules\Core\Models\Stores\Store;
use Modules\Core\Repositories\Interfaces\StoreRepositoryInterface;

class StoreRepository implements StoreRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function first()
    {
        return Store::first();
    }

    public function getList(array $filter, int $paginate)
    {
        $groupQuery = Store::with('description');
        $stores = $groupQuery->paginate($paginate);

        return $stores;
    }

    public function getActive()
    {
        $stores = Store::with('description')->where('is_active', 1)->first();

        return $stores;
    }

    public function store(array $params)
    {
        // insert data in table oc_address
        if (isset($params['address'])) {
            $params['address']['postcode'] = 10000;
            $params['address']['custom_field'] = '';
            $address = Address::create($params['address']);
            $address_id = $address->address_id;
        }

        // insert data in table oc_store
        if (isset($params['store'])) {
            $params['store']['ssl'] = '';
            $params['store']['logo'] = '';
            $params['store']['icon'] = '';
            $params['store']['image'] = '';

            $params['store'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['store']);

            $params['store']['address_id'] = $address_id;
            $store = Store::create($params['store']);
            $store_id = $store->store_id;
        }

        //insert data in table oc_store_description
        if (isset($params['store_description'])) {
            $params['store_description']['store_id'] = $store_id;
            $params['store_description']['language_id'] = 1;

            $params['store_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['store_description']);

            Description::create($params['store_description']);
        }

        //insert data in table oc_setting
        if (isset($params['setting'])) {
            $params['config_setting']['store_id'] = $store_id;
            $params['config_setting']['code'] = 'setting';
            $params['config_setting']['key'] = 'setting_location_store';
            $params['config_setting']['value'] = json_encode($params['setting']);
            $params['config_setting']['serialized'] = 0;
            Setting::create($params['config_setting']);
        }

        return $store_id;
    }

    public function edit(int $id)
    {
        return Store::findOrFail($id);
    }

    public function update(array $params, int $id)
    {
        if (isset($params['store'])) {
            $params['store']['ssl'] = '';
            $params['store']['icon'] = '';
            $params['store']['image'] = '';

            $params['store'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['store']);

            $params['store']['address_id'] = $params['address']['id'];

            $store = Store::findOrFail($id);
            $store->update($params['store']);
        }

        if (isset($params['store_description'])) {
            $params['store_description']['store_id'] = $id;
            $params['store_description']['language_id'] = 1;

            $params['store_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['store_description']);

            $description = Description::findOrFail($id);
            $description->update($params['store_description']);
        }

        if (isset($params['address'])) {
            $address = Address::findOrFail($params['address']['id']);
            $address->update($params['address']);
        }

        return $store;
    }

    public function findOneByField($field, $value)
    {
        return Store::where($field, $value)->first();
    }

    public function destroy(int $id)
    {
    }
}
