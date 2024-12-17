<?php

namespace Modules\Customer\Repositories;

use Modules\Core\Models\Location\Address;

//use Your Model
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function getList(array $filter, int $paginate)
    {
        $customerQuery = Customer::with('address', 'group', 'addressActive');

        if (isset($filter['filter']['customer'])) {
            $customerQuery->where($filter['filter']['customer']['key'], 'LIKE', '%' . $filter['filter']['customer']['value'] . '%');
        }

        if (isset($filter['filter']['group']['customer_group_id'])) {
            $customerQuery->where('customer_group_id', $filter['filter']['group']['customer_group_id']);
        }

        if (isset($filter['filter']['filter_by_type'])) {
            $row = 0;
            foreach ($filter['filter']['filter_by_type'] as $field => $value) {
                if ($value['value'] !== null && $row == 0) {
                    $customerQuery->where($field, $value['key'], $value['value']);
                }

                if ($value['value'] !== null && $row > 0) {
                    $customerQuery->orWhere($field, $value['key'], $value['value']);
                }

                $row++;
            }
        }

        $customers = $customerQuery->paginate($paginate);

        return $customers;
    }

    public function store(array $params)
    {
        // insert data in table customer
        if (isset($params['customer'])) {
            $params['customer']['language_id'] = 1;
            $params['customer']['store_id'] = 0;
            $params['customer']['fax'] = '';
            $params['customer']['ip'] = '';
            $params['customer']['code'] = '';
            $params['customer']['custom_field'] = '';
            $params['customer']['token'] = '';
            $params['customer']['customer_group_id'] = isset($params['customer']['customer_group_id']) ? $params['customer']['customer_group_id'] : 1;
            $params['customer']['gender'] = isset($params['customer']['gender']) ? $params['customer']['gender'] : 'male';
            $params['customer']['birthday'] = isset($params['customer']['birthday']) ? $params['customer']['birthday'] : '1970-01-01';
            $params['customer']['password'] = isset($params['customer']['password']) ? md5($params['customer']['password']) : md5('Vnlt@123');
            $params['customer']['status'] = isset($params['customer']['status']) ? $params['customer']['status'] : 1;
            $params['customer']['approved'] = isset($params['customer']['approved']) ? $params['customer']['approved'] : 0;
            $params['customer']['safe'] = isset($params['customer']['safe']) ? $params['customer']['safe'] : 0;
            $customer = Customer::create($params['customer']);
            $customer_id = $customer->customer_id;
        }

        // insert data in table address
        if (isset($params['address'])) {
            $params['address']['customer_id'] = $customer_id;
            $params['address']['postcode'] = 10000;
            $params['address']['custom_field'] = '';
            $params['address']['is_active'] = 1;
            $params['address']['is_pickup'] = isset($params['address']['is_pickup']) && $params['address']['is_pickup'] == 'on' ? 1 : 0;
            $params['address']['is_return'] = isset($params['address']['is_return']) && $params['address']['is_return'] == 'on' ? 1 : 0;
            $address = Address::create($params['address']);
            $address_id = $address->address_id;
        }

        return $customer_id;
    }

    public function edit($id)
    {
        return Customer::findOrFail($id);
    }

    public function address(array $params, int $customer_id)
    {
        if (isset($params['address']) && $params['address']['address_id'] != 0) {
            $params['address']['customer_id'] = $customer_id;
            $params['address']['is_active'] = isset($params['address']['is_active']) && $params['address']['is_active'] == 'on' ? 1 : 0;
            $params['address']['is_pickup'] = isset($params['address']['is_pickup']) && $params['address']['is_pickup'] == 'on' ? 1 : 0;
            $params['address']['is_return'] = isset($params['address']['is_return']) && $params['address']['is_return'] == 'on' ? 1 : 0;
            Address::findOrfail($params['address']['address_id'])->update($params['address']);
        }

        if (isset($params['address']) && $params['address']['address_id'] == 0) {
            $params['address']['customer_id'] = $customer_id;
            $params['address']['postcode'] = 10000;
            $params['address']['custom_field'] = '';
            $params['address']['is_active'] = isset($params['address']['is_active']) && $params['address']['is_active'] == 'on' ? 1 : 0;
            $params['address']['is_pickup'] = isset($params['address']['is_pickup']) && $params['address']['is_pickup'] == 'on' ? 1 : 0;
            $params['address']['is_return'] = isset($params['address']['is_return']) && $params['address']['is_return'] == 'on' ? 1 : 0;
            Address::create($params['address']);
        }

        return $params['address']['address_id'];
    }

    public function update(array $params, int $id)
    {
        if (! strlen($params['customer']['password'])) {
            unset($params['customer']['password']);
            unset($params['customer']['confirm']);
        }

        if (isset($params['customer'])) {
            $customer = Customer::findOrFail($id);
            $customer->update($params['customer']);
        }

        return $customer;
    }

    public function destroy(int $id)
    {
        Address::where('customer_id', $id)->delete();
        Customer::findOrFail($id)->delete();

        return $id;
    }

    public function destroyAddress(int $id)
    {
        Address::findOrFail($id)->delete();

        return $id;
    }
}
