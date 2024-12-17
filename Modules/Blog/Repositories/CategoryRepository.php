<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Models\Categories\Category;

//use Models
use Modules\Blog\Models\Categories\Description;
use Modules\Blog\Models\Categories\Layout;
use Modules\Blog\Models\Categories\Path;
use Modules\Blog\Models\Categories\Store;
use Modules\Blog\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Core\Models\UrlAlias;

class CategoryRepository implements CategoryRepositoryInterface
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
        if (isset($filter['code'])) {
            return $this->getByCateId($filter['code'], $paginate);
        }

        $query = Category::with('description');

        if (isset($filter['filter']['category']['key']) && isset($filter['filter']['category']['value'])) {
            $query->whereHas('description', function ($q) use ($filter) {
                $q->where($filter['filter']['category']['key'], 'like', '%' . $filter['filter']['category']['value'] . '%');
            });
        }

        return $query->paginate($paginate);
    }

    public function getByCateId(int $id, int $paginate)
    {
    }

    public function edit(int $id)
    {
        return Category::findOrFail($id);
    }

    public function detail(int $id)
    {
    }

    public function search(array $params)
    {
    }

    public function getParent(int $id)
    {
        return Category::where('category_id', '<>', $id)
            ->limit(Category::LIMIT_AJAX)->get();
    }

    public function store(array $params)
    {
        if (isset($params['cat_news'])) {
            $params['cat_news'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['cat_news']);

            $params['cat_news']['status'] = $params['cat_news']['status'] == 'on' ? 1 : 0;
            $category = Category::create($params['cat_news']);
            $category_id = $category->category_id;
        }

        if (isset($params['cat_news_description'])) {
            $params['cat_news_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['cat_news_description']);

            $params['cat_news_description']['category_id'] = $category_id;
            $params['cat_news_description']['language_id'] = 1;
            Description::create($params['cat_news_description']);
        }

        $params['cat_news_path']['category_id'] = $category_id;
        $params['cat_news_path']['path_id'] = $category_id;
        $params['cat_news_path']['level'] = 0;
        Path::create($params['cat_news_path']);

        $params['cat_news_layout']['category_id'] = $category_id;
        $params['cat_news_layout']['store_id'] = 1;
        $params['cat_news_layout']['layout_id'] = 1;
        Layout::create($params['cat_news_layout']);

        $params['cat_news_store']['category_id'] = $category_id;
        $params['cat_news_store']['store_id'] = 1;
        Store::create($params['cat_news_store']);

        return $category_id;
    }

    public function update(array $params, int $id)
    {
        if (isset($params['cat_news'])) {
            $params['cat_news'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['cat_news']);

            $params['cat_news']['status'] = $params['cat_news']['status'] == 'on' ? 1 : 0;
            $category = Category::findOrFail($id);
            $category->update($params['cat_news']);
        }

        if (isset($params['cat_news_description'])) {
            $params['cat_news_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['cat_news_description']);

            $params['cat_news_description']['language_id'] = 1;
            $description = Description::where('category_id', $id)
                ->where('language_id', 1)
                ->first();
            $description->update($params['cat_news_description']);
        }

        //check slug
        if (isset($params['url_alias']['slug']) && strlen($params['url_alias']['slug'])) {
            $slug = UrlAlias::where('query', 'category_id=' . $id)->count();
            if ($slug > 0) {
                UrlAlias::where('query', 'category_id=' . $id)->update([
                    'keyword' => $params['url_alias']['slug'],
                ]);
            }

            if ($slug == 0) {
                UrlAlias::create([
                    'query' => 'category_id=' . $id,
                    'keyword' => $params['url_alias']['slug'],
                    'language_id' => 1,
                ]);
            }
        }

        return $id;
    }

    public function destroy(int $id)
    {
        Category::findOrFail($id)->delete();
        Description::findOrFail($id)->delete();
        Path::findOrFail($id)->delete();
        Layout::findOrFail($id)->delete();
        Store::findOrFail($id)->delete();

        return $id;
    }

    public function changeStatus(int $id, $status)
    {
        Category::findOrFail($id)->update($status);

        return $id;
    }
}
