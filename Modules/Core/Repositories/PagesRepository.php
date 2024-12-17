<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Informations\Description;

//use model
use Modules\Core\Models\Informations\Information;
use Modules\Core\Repositories\Interfaces\PagesRepositoryInterface;

class PagesRepository implements PagesRepositoryInterface
{
    /**
     * @return string
     *  Return the model interface
     */
    public function model()
    {
        return "App\Models\Ecommerce\Informations\Information";
    }

    public function getList($filter = [], $paginate)
    {
        $query = Information::with('description', 'layout', 'store');
        if (isset($filter['filter']['information']['key']) && isset($filter['filter']['information']['value'])) {
            $query->whereHas('description', function ($q) use ($filter) {
                $q->where($filter['filter']['information']['key'], 'like', '%' . $filter['filter']['information']['value'] . '%');
            });
        }

        return $query->paginate($paginate);
    }

    public function store($params)
    {
        if (isset($params['information'])) {
            $params['information']['sort_order'] = isset($params['information']['sort_order']) ? $params['information']['sort_order'] : 0;
            $params['information']['status'] = isset($params['information']['status']) ? $params['information']['status'] : 0;
            $params['information']['bottom'] = isset($params['information']['bottom']) ? $params['information']['bottom'] : 0;
            $information = Information::create($params['information']);
        }

        if (isset($params['information_description'])) {
            $params['information_description']['information_id'] = $information->information_id;
            $params['information_description']['language_id'] = 1;
            $params['information_description']['meta_keyword'] = '';
            $params['information_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['information_description']);
            $information->description()->create($params['information_description']);
        }

        return $information->information_id;
    }

    public function edit($id)
    {
        return Information::find($id);
    }

    public function update($params, $information_id)
    {
        if (isset($params['information'])) {
            $params['information']['sort_order'] = isset($params['information']['sort_order']) ? $params['information']['sort_order'] : 0;
            $params['information']['status'] = isset($params['information']['status']) ? $params['information']['status'] : 0;
            $params['information']['bottom'] = isset($params['information']['bottom']) ? $params['information']['bottom'] : 0;
            Information::findOrFail($information_id)->update($params['information']);
        }

        if (isset($params['information_description'])) {
            $params['information_description']['language_id'] = 1;
            $params['information_description']['meta_keyword'] = '';
            $params['information_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['information_description']);
            Description::findOrFail($information_id)->update($params['information_description']);
        }

        return $information_id;
    }

    public function destroy($id)
    {
        Information::find($id)->delete();
        Description::where('information_id', $id)->delete();

        return $id;
    }
}
