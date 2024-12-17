<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Taxs\TaxClass;
use Modules\Core\Models\Taxs\TaxRate;
use Modules\Core\Models\Taxs\TaxRule;
use Modules\Core\Repositories\Interfaces\TaxRepositoryInterface;

class TaxRepository implements TaxRepositoryInterface
{
    public function getList(array $filter, int $paginate)
    {
        return TaxRule::with('taxClass', 'taxRate')->paginate($paginate);
    }

    public function store(array $params)
    {
        // insert data in table tax_class
        if (isset($params['tax_class'])) {
            $tax_class = TaxClass::create($params['tax_class']);
            $tax_class_id = $tax_class->tax_class_id;
        }

        // insert data in table tax_rule_tax_rate
        if (isset($params['tax_rate'])) {
            $params['tax_rate']['type'] = 'P';
            $tax_rate = TaxRate::create($params['tax_rate']);
            $tax_rate_id = $tax_rate->tax_rate_id;
        }

        // insert data in table tax_rule
        if (isset($params['tax_rule'])) {
            $params['tax_rule']['tax_class_id'] = $tax_class_id;
            $params['tax_rule']['tax_rate_id'] = $tax_rate_id;
            $params['tax_rule']['based'] = implode(',', $params['tax_rule']['based']);
            TaxRule::create($params['tax_rule']);
        }

        return true;
    }

    public function detail($tax_rule_id)
    {
        return TaxRule::with('taxClass', 'taxRate')->find($tax_rule_id);
    }

    public function update(array $params, int $tax_rule_id)
    {
        // update data in table tax_class
        if (isset($params['tax_class'])) {
            TaxRule::find($tax_rule_id)->taxClass->update($params['tax_class']);
        }

        // update data in table tax_rule_tax_rate
        if (isset($params['tax_rate'])) {
            $params['tax_rate']['type'] = 'P';
            TaxRule::find($tax_rule_id)->taxRate->update($params['tax_rate']);
        }

        // update data in table tax_rule
        if (isset($params['tax_rule'])) {
            $params['tax_rule']['based'] = implode(',', $params['tax_rule']['based']);
            TaxRule::find($tax_rule_id)->update($params['tax_rule']);
        }

        return $tax_rule_id;
    }

    public function destroy(int $id)
    {
        $tax_rule = TaxRule::find($id);
        $tax_rule->taxClass->delete();
        $tax_rule->taxRate->delete();
        $tax_rule->delete();

        return $id;
    }
}
