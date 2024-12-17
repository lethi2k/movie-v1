<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Models\News\Category;

//use Model
use Modules\Blog\Models\News\Description;
use Modules\Blog\Models\News\News;
use Modules\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use Modules\Core\Models\UrlAlias;

class BlogRepository implements BlogRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return News::class;
    }

    public function getList(array $filter, int $paginate)
    {
        $query = News::with('description', 'categories', 'user');
        if (isset($filter['filter']['blog']['key']) && isset($filter['filter']['blog']['value'])) {
            $query->whereHas('description', function ($q) use ($filter) {
                $q->where($filter['filter']['blog']['key'], 'like', '%' . $filter['filter']['blog']['value'] . '%');
            });
        }

        if (isset($filter['filter']['date_start']) && isset($filter['filter']['date_end'])) {
            $query->whereBetween('date_added', [$filter['filter']['date_start'], $filter['filter']['date_end']]);
        }

        if (isset($filter['filter']['category']['category_id']) && $filter['filter']['category']['category_id'] != -1) {
            $query->whereHas('categories', function ($q) use ($filter) {
                $q->where('category_id', $filter['filter']['category']['category_id']);
            });
        }

        if (isset($filter['filter']['not_news_id'])) {
            $query->where('news_id', '<>', $filter['filter']['not_news_id']);
        }

        if (isset($filter['filter']['categories']) && $filter['filter']['categories']) {
            $query->whereHas('categories', function ($q) use ($filter) {
                $q->whereIn('category_id', $filter['filter']['categories']);
            });
        }

        if (isset($filter['filter']['user']['user_id']) && $filter['filter']['user']['user_id'] != -1) {
            $query->whereHas('user', function ($q) use ($filter) {
                $q->where('user_id', $filter['filter']['user']['user_id']);
            });
        }

        if (isset($filter['filter']['limit'])) {
            return $query->limit($filter['filter']['limit'])->get();
        }

        if (isset($filter['filter']['order_by']) && isset($filter['filter']['order_direction'])) {
            return $query->orderBy($filter['filter']['order_by'], $filter['filter']['order_direction']);
        }

        return $query->paginate($paginate);
    }

    public function edit(int $id)
    {
        return News::findOrFail($id);
    }

    public function store(array $params)
    {
        //check isset params['news'] and create
        if (isset($params['news'])) {
            $params['news'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['news']);

            $params['news']['user_id'] = 1;
            $news = News::create($params['news']);
            $news_id = $news->news_id;
        }

        //check isset params['news_description'] and create
        if (isset($params['news_description'])) {
            $params['news_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['news_description']);

            $params['news_description']['language_id'] = 1;
            $meta_description = html_entity_decode(strip_tags($params['news_description']['description_short']));
            $params['news_description']['meta_description'] = substr($meta_description, 0, 355);
            $params['news_description']['meta_keyword'] = '';
            $params['news_description']['news_id'] = $news_id;
            Description::create($params['news_description']);
        }

        //check isset params['news_category'] and create
        if (isset($params['news_category'])) {
            foreach ($params['news_category'] as $category_id) {
                $category['news_id'] = $news_id;
                $category['category_id'] = $category_id;
                Category::create($category);
            }
        }

        //check slug
        if (isset($params['url_alias']['slug']) && strlen($params['url_alias']['slug'])) {
            UrlAlias::where('query', 'news_id=' . $news_id)->delete();
            UrlAlias::create([
                'query' => 'news_id=' . $news_id,
                'keyword' => $params['url_alias']['slug'],
                'language_id' => 1,
            ]);
        }

        return $news;
    }

    public function update(array $params, int $id)
    {
        //check isset params['news'] and create
        if (isset($params['news'])) {
            $params['news'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['news']);

            $params['news']['user_id'] = 1;
            News::findOrFail($id)->update($params['news']);
        }

        //check isset params['news_description'] and create
        if (isset($params['news_description'])) {
            $params['news_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['news_description']);

            $params['news_description']['language_id'] = 1;
            $meta_description = html_entity_decode(strip_tags($params['news_description']['description_short']));
            $params['news_description']['meta_description'] = substr($meta_description, 0, 255);
            $params['news_description']['meta_keyword'] = '';
            $params['news_description']['news_id'] = $id;
            Description::where('news_id', $id)->update($params['news_description']);
        }

        //check isset params['news_category'] and create
        if (isset($params['news_category'])) {
            Category::where('news_id', $id)->delete();
            foreach ($params['news_category'] as $category_id) {
                $category['news_id'] = $id;
                $category['category_id'] = $category_id;
                Category::create($category);
            }
        }

        //check slug
        if (isset($params['url_alias']['slug']) && strlen($params['url_alias']['slug'])) {
            $slug = UrlAlias::where('query', 'news_id=' . $id)->count();
            if ($slug > 0) {
                UrlAlias::where('query', 'news_id=' . $id)->update([
                    'keyword' => $params['url_alias']['slug'],
                ]);
            }

            if ($slug == 0) {
                UrlAlias::create([
                    'query' => 'news_id=' . $id,
                    'keyword' => $params['url_alias']['slug'],
                    'language_id' => 1,
                ]);
            }
        }

        return $id;
    }

    public function destroy(int $id)
    {
        News::findOrFail($id)->delete();
        Description::where('news_id', $id)->delete();
        UrlAlias::where('query', 'news_id=' . $id)->delete();

        return $id;
    }

    public function changeStatus(int $id, $status)
    {
        News::findOrFail($id)->update($status);

        return $id;
    }
}
