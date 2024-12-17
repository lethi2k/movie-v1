<?php

namespace Modules\Attribute\Repositories;

use Modules\Attribute\Models\Attribute;

//use Your Model
use Modules\Attribute\Models\Description;
use Modules\Attribute\Models\Group;
use Modules\Attribute\Models\GroupDescription;
use Modules\Attribute\Repositories\Interfaces\AttributeRepositoryInterface;
use Modules\Core\Eloquent\Repository;

// extends Repository

class AttributeRepository implements AttributeRepositoryInterface
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
        $groupQuery = Group::with('description', 'attributeDescriptions');
        if (isset($filter['filter'])) {
            if ($filter['filter']['key'] === 'name') {
                $groupQuery->whereHas('description', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['filter']['value'] . '%');
                });
            }

            if ($filter['filter']['key'] === 'attribute_name') {
                $groupQuery->whereHas('attributeDescriptions', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['filter']['value'] . '%');
                });
            }
        }

        $groups = $groupQuery->paginate($paginate);

        return $groups;
    }

    public function getListAttr($filter, $paginate)
    {
        $attributeQuery = Attribute::with('description');
        if (isset($filter['filter'])) {
            if ($filter['filter']['key'] === 'name') {
                $attributeQuery->whereHas('description', function ($query) use ($filter) {
                    $query->where('name', 'LIKE', '%' . $filter['filter']['value'] . '%');
                });
            }
        }

        $attributes = $attributeQuery->paginate($paginate);

        return $attributes;
    }

    public function store($params)
    {
        // insert data in table oc_attribute_group
        if (isset($params['attribute_group'])) {
            $attribute_group = Group::create($params['attribute_group']);
            $attribute_group_id = $attribute_group->attribute_group_id;
        }

        //insert data in table oc_attribute_group_description
        if (isset($params['attribute_group_description'])) {
            $params['attribute_group_description']['attribute_group_id'] = $attribute_group_id;
            $params['attribute_group_description']['language_id'] = 1;
            GroupDescription::create($params['attribute_group_description']);
        }

        //insert data in table oc_option_description
        if (isset($params['attribute']) && ! empty($params['attribute'])) {
            foreach ($params['attribute'] as $attribute) {
                $this->insertAttribute($attribute, $attribute_group_id);
            }
        }

        return $attribute_group_id;
    }

    public function edit($id)
    {
        return Group::findOrFail($id);
    }

    public function update($params, $attribute_group_id)
    {
        // update data in table oc_attribute_group
        if (isset($params['attribute_group'])) {
            $group = Group::findOrFail($attribute_group_id);
            $group->update($params['attribute_group']);
        }

        //update data in table oc_attribute_group_description
        if (isset($params['attribute_group_description'])) {
            $params['attribute_group_description']['attribute_group_id'] = $attribute_group_id;
            $params['attribute_group_description']['language_id'] = 1;
            $group_description = GroupDescription::findOrFail($attribute_group_id);
            $group_description->update($params['attribute_group_description']);
        }

        //update data in table oc_option_description
        if (isset($params['attribute']) && ! empty($params['attribute'])) {

            //delete and insert data in table oc_option_description
            Attribute::where('attribute_group_id', $attribute_group_id)->delete();
            Description::where('attribute_group_id', $attribute_group_id)->delete();

            foreach ($params['attribute'] as $attribute) {
                $this->insertAttribute($attribute, $attribute_group_id);
            }
        }

        return $attribute_group_id;
    }

    public function destroy($attribute_group_id)
    {
        $is_delete = true;
        $group = Group::findOrFail($attribute_group_id);
        $attributes = Attribute::where('attribute_group_id', $attribute_group_id)->get();
        foreach ($attributes as $attribute) {
            if ($attribute->products->count() > 0) {
                $is_delete = false;
            }
        }

        if (! $is_delete) {
            $group->update(['status' => '-1']);

            return false;
        }

        $group->attributes->delete();
        $group->attributeDescriptions->delete();

        $group->delete();
        $group->description->delete();

        return $attribute_group_id;
    }

    private function insertAttribute($attribute, $attribute_group_id)
    {
        //insert data in table oc_attribute
        $attribute['attribute_group_id'] = $attribute_group_id;
        $attr = Attribute::create($attribute);
        $attribute_id = $attr->attribute_id;

        //insert data in table oc_attribute_description
        $attribute['attribute_id'] = $attribute_id;
        $attribute['language_id'] = 1;
        Description::create($attribute);
    }
}
