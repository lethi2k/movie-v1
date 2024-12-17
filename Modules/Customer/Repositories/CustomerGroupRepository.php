<?php

namespace Modules\Customer\Repositories;

use Modules\Customer\Models\Customer;
use Modules\Customer\Models\Group;

//use Your Model
use Modules\Customer\Models\GroupDescription;
use Modules\Customer\Models\TaxRate;
use Modules\Customer\Repositories\Interfaces\CustomerGroupRepositoryInterface;

class CustomerGroupRepository implements CustomerGroupRepositoryInterface
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
        $groupQuery = Group::with('description');
        $groups = $groupQuery->paginate($paginate);

        return $groups;
    }

    public function store(array $params)
    {
        // insert data in table customer_group
        if (isset($params['customer_group'])) {
            $params['customer_group']['approval'] = (isset($params['customer_group']['approval']) && $params['customer_group']['approval'] == 'on') ? 1 : 0;
            $customer_group = Group::create($params['customer_group']);
            $customer_group_id = $customer_group->customer_group_id;
        }

        // insert data in table customer_group_description
        if (isset($params['customer_group_description'])) {
            $params['customer_group_description']['customer_group_id'] = $customer_group_id;
            $params['customer_group_description']['language_id'] = 1;
            GroupDescription::create($params['customer_group_description']);
        }

        // insert data in table customer_group_tax_rate
        if (isset($params['tax_rate_to_customer_group'])) {
            $params['tax_rate_to_customer_group']['customer_group_id'] = $customer_group_id;
            TaxRate::create($params['tax_rate_to_customer_group']);
        }

        //set customer group id to customer
        if (isset($params['customer'])) {
            foreach ($params['customer'] as $customer_id) {
                Customer::find($customer_id)->update([
                    'customer_group_id' => $customer_group_id,
                ]);
            }
        }

        return $customer_group_id;
    }

    public function detail($id)
    {
        $group = Group::with('description')->find($id);

        return $group;
    }

    public function update(array $params, int $id)
    {
        // insert data in table customer_group
        if (isset($params['customer_group'])) {
            $params['customer_group']['approval'] = (isset($params['customer_group']['approval']) && $params['customer_group']['approval'] == 'on') ? 1 : 0;
            Group::findOrfail($id)->update($params['customer_group']);
        }

        // insert data in table customer_group_description
        if (isset($params['customer_group_description'])) {
            $params['customer_group_description']['customer_group_id'] = $id;
            $params['customer_group_description']['language_id'] = 1;
            GroupDescription::findOrfail($id)->update($params['customer_group_description']);
        }

        // insert data in table customer_group_tax_rate
        if (isset($params['tax_rate_to_customer_group'])) {
            $params['tax_rate_to_customer_group']['customer_group_id'] = $id;
            TaxRate::where('customer_group_id', $id)->first()->update($params['tax_rate_to_customer_group']);
        }

        return $id;
    }

    public function destroy(int $id)
    {
        Group::destroy($id);
        GroupDescription::where('customer_group_id', $id)->delete();
        TaxRate::where('customer_group_id', $id)->delete();

        return $id;
    }
}
