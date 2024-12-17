<?php

namespace Modules\Category\Repositories;

use Modules\Category\Models\Category;

//use Your Model
use Modules\Category\Models\Description;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Core\Models\UrlAlias;
use Modules\Core\Service\UploadService;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $upload_img;

    /**
     * @return string
     *  Return the model interface
     */
    public function model()
    {
        return "Modules\Category\Models\Category";
    }

    public function __construct(UploadService $upload)
    {
        $this->upload_img = $upload;
    }

    public function getList($filter = [], $paginate)
    {
        $query = Category::with('description');

        if (isset($filter['code'])) {
            return $this->getByCateId($filter['code'], $paginate);
        }

        if (isset($filter['category_name'])) {
            $query->whereHas('description', function ($query) use ($filter) {
                $query->where('name', 'LIKE', '%' . $filter['category_name'] . '%');
            });
        }

        if (isset($filter['status'])) {
            $query->where('status', $filter['status']);
        }

        if (isset($filter['is_not_trash']) && ! isset($filter['filter']['parent_id'])) {
            $query->where('status', '<>', '-1');
            $query->where('parent_id', 0);
        }

        if (isset($filter['filter']['parent_id'])) {
            $query->where('parent_id', $filter['filter']['parent_id']);
        }

        return $query->paginate($paginate);
    }

    public function getByCateId($id, $paginate)
    {
        return Category::where('category_id', $id)->paginate($paginate);
    }

    public function detail($id)
    {
        return Category::findOrFail($id);
    }

    public function search($params)
    {
        return Category::leftJoin(
            'oc_category_description',
            'oc_category_description.category_id',
            '=',
            'oc_category.category_id'
        )
            ->where('oc_category_description.name', 'LIKE', '%' . $params['name'] . '%')
            ->limit(Category::LIMIT_AJAX)->get();
    }

    public function getParent($id)
    {
        return Category::where('category_id', '<>', $id)
            ->limit(Category::LIMIT_AJAX)->get();
    }

    public function store($params)
    {
        if (isset($params['category'])) {
            $params['category'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['category']);

            // $params['category']['image'] = $_FILES['category']['name']['image'];
            $params['category']['status'] = $params['category']['status'] == 'on' ? 1 : 0;
            $category = Category::create($params['category']);
            $category_id = $category->category_id;
        }

        if (isset($params['category_description'])) {
            $params['category_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['category_description']);

            $params['category_description']['category_id'] = $category_id;
            $params['category_description']['language_id'] = 1;
            Description::create($params['category_description']);
        }

        if (isset($params['category_description']['seo_url']) && strlen($params['category_description']['seo_url'])) {
            UrlAlias::where('query', 'category_id=' . $category_id)->delete();
            UrlAlias::create([
                'query' => 'category_id=' . $category_id,
                'keyword' => $params['category_description']['seo_url'],
                'language_id' => 1,
            ]);
        }

        return $category_id;
    }

    public function update($params, $id)
    {
        if (isset($params['category'])) {
            $params['category']['status'] = $params['category']['status'] == 'on' ? 1 : 0;
            $category = Category::findOrFail($id);
            $category->update($params['category']);
        }

        if (isset($params['category_description'])) {
            $params['category_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['category_description']);

            $params['category_description']['language_id'] = 1;
            $category_description = Description::where(
                [
                    'category_id' => $id,
                    'language_id' => $params['category_description']['language_id'],
                ]
            )->first();
            $category_description->update($params['category_description']);
        }

        if (isset($params['category_description']['seo_url']) && strlen($params['category_description']['seo_url'])) {
            $slug = UrlAlias::where('query', 'category_id=' . $id)->count();

            if ($slug > 0) {
                UrlAlias::where('query', 'category_id=' . $id)->update([
                    'keyword' => $params['category_description']['seo_url'],
                ]);
            }

            if ($slug == 0) {
                UrlAlias::create([
                    'query' => 'category_id=' . $id,
                    'keyword' => $params['category_description']['seo_url'],
                    'language_id' => 1,
                ]);
            }
        }

        return $id;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->products->count() > 0) {
            $category->update(['status' => '-1']);
            return false;
        }

        $category->delete();
        $category->description()->delete();
        UrlAlias::where('query', 'category_id=' . $id)->delete();

        return $id;
    }

    public function changeStatus($id, $status)
    {
        Category::findOrFail($id)->update($status);

        return $id;
    }
}
