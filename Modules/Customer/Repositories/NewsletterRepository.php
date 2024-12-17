<?php

namespace Modules\Customer\Repositories;

use Modules\Customer\Models\Newsletter;

//use model
use Modules\Customer\Repositories\Interfaces\NewsletterRepositoryInterface;

class NewsletterRepository implements NewsletterRepositoryInterface
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
        $query = Newsletter::query();
        if (isset($filter['viewed'])) {
            $query->where('viewed', $filter['viewed']);
        }

        if (isset($filter['key']) && isset($filter['value'])) {
            $query->where($filter['key'], 'like', '%' . $filter['value'] . '%');
        }

        $query->orderBy('newsletter_data_id', 'desc');

        return $query->paginate($paginate);
    }

    public function store($params)
    {
        if (isset($params['contact'])) {
            $model = new Newsletter();
            $model->email = $params['contact']['email'];
            $model->ip = $params['contact']['ip'];
            $model->ip = $params['contact']['viewed'];
            $model->value = json_encode($params['contact']);
            $model->save();

            return $model->newsletter_data_id;
        }
    }

    public function edit($id)
    {
        return Newsletter::findOrFail($id);
    }

    public function update($params, $id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return $newsletter->update($params);
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return $newsletter->delete();
    }
}
