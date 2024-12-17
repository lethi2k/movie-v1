<?php

namespace Modules\Option\Repositories;

use Modules\Option\Models\Description;

//use Your Model
use Modules\Option\Models\Option;
use Modules\Option\Models\Value;
use Modules\Option\Models\ValueDescription;
use Modules\Option\Repositories\Interfaces\OptionRepositoryInterface;

class OptionRepository implements OptionRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return "App\Models\Ecommerce\Categories\Variant";
    }

    /**
     * @return array
     *  Return list option paginate 20
     */
    public function getList($filter = [], $paginate)
    {
        $variantQuery = Option::with('description', 'values', 'valueDescriptions');
        if (isset($filter['filter'])) {
            if ($filter['filter']['key'] === 'name') {
                $variantQuery->whereHas('description', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['filter']['value'] . '%');
                });
            }

            if ($filter['filter']['key'] === 'value_name') {
                $variantQuery->whereHas('valueDescriptions', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['filter']['value'] . '%');
                });
            }
        }

        $variants = $variantQuery->paginate($paginate);

        return $variants;
    }

    /**
     * @return array
     *  Return list option paginate 20
     */
    public function getValueByOption($option_id)
    {
        return Value::where('option_id', $option_id)->get();
    }

    /**
     * @return int
     *  Return option_id
     */
    public function store($params)
    {
        //insert data in table oc_option
        if (isset($params['oc_option'])) {
            $option = Option::create($params['oc_option']);
            $option_id = $option->option_id;
        }

        //insert data in table oc_option_description
        if (isset($params['option_description'])) {
            $params['option_description']['option_id'] = $option_id;
            $params['option_description']['language_id'] = 1;
            Description::create($params['option_description']);
        }

        if (isset($params['option_value']) && ! empty($params['option_value'])) {
            foreach ($params['option_value'] as $key => $option_value) {
                $this->insertValue($option_value, $option_id);
            }
        }

        return $option_id;
    }

    /**
     * @return array
     *  Return one value option
     */
    public function edit($option_id)
    {
        return Option::findOrFail($option_id);
    }

    /**
     * @return int
     *  Return option_id
     */
    public function update($params, $option_id)
    {
        //insert data in table oc_option
        if (isset($params['oc_option'])) {
            $option = Option::findOrFail($option_id);
            $option->update($params['oc_option']);
        }

        //insert data in table oc_option_description
        if (isset($params['option_description'])) {
            $params['option_description']['option_id'] = $option_id;
            $params['option_description']['language_id'] = 1;
            $option_description = Description::where(
                [
                    'option_id' => $option_id,
                    'language_id' => $params['option_description']['language_id'],
                ]
            )->first();
            $option_description->fill($params['option_description'])->save();
        }

        if (isset($params['option_value']) && is_array($params['option_value'])) {
            foreach ($params['option_value'] as $key => $option_value) {

                //insert data in table option value
                if (! isset($option_value['option_value_id'])) {
                    $this->insertValue($option_value, $option_id);
                }

                //update data in table option value
                if (isset($option_value['option_value_id']) && strlen($option_value['option_value_id'])) {
                    $this->updateValue($option_value, $option_id);
                }
            }
        }

        return $option_id;
    }

    public function destroy($id)
    {
        $option = Option::findOrFail($id);

        if ($option->productsOption->count() > 0) {
            $option->update(['status' => '-1']);

            return false;
        }

        // productsOption
        $option->delete();
        $option->description->delete();
        $option->values->each(function ($value) {
            $value->description->delete();
            $value->delete();
        });
    }

    private function insertValue($option_value, $option_id)
    {
        //insert data in table oc_value
        $option_value['option_id'] = $option_id;
        $value = Value::create($option_value);
        $option_value_id = $value->option_value_id;

        //insert data in table oc_value_description
        $option_value['option_value_id'] = $option_value_id;
        $option_value['language_id'] = 1;
        ValueDescription::create($option_value);
    }

    private function updateValue($option_value, $option_id)
    {
        //update data in table oc_value
        $option_value['option_id'] = $option_id;
        $value = Value::findOrFail($option_value['option_value_id']);
        $value->update($option_value);

        //update data in table oc_value_description
        $option_value['language_id'] = 1;
        $value_description = ValueDescription::where(
            [
                'option_value_id' => $option_value['option_value_id'],
                'language_id' => $option_value['language_id'],
            ]
        )->first();
        $value_description->fill($option_value)->save();
    }
}
