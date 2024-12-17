<?php

namespace Modules\Core\Repositories;

use Modules\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use Modules\Blog\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface as CategoryProductRepositoryInterface;
use Modules\Core\Models\Menus\Taskbar;
use Modules\Core\Models\Menus\TaskbarDescription;
use Modules\Core\Models\Menus\TaskbarGroup;

// use Models
use Modules\Core\Models\Menus\TaskbarGroupDescription;
use Modules\Core\Repositories\Interfaces\LinksRepositoryInterface;
use Modules\Core\Repositories\Interfaces\MenusRepositoryInterface;
use Modules\Core\Repositories\Interfaces\PagesRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class MenusRepository implements MenusRepositoryInterface
{
    private $catNewService;
    private $blogService;
    private $catProductService;
    private $productService;
    private $pagesService;
    private $linksService;

    public function __construct(
        CategoryRepositoryInterface $catNewService,
        BlogRepositoryInterface $blogService,
        CategoryProductRepositoryInterface $catProductService,
        ProductRepositoryInterface $productService,
        PagesRepositoryInterface $pagesService,
        LinksRepositoryInterface $linksService
    ) {
        $this->catNewService = $catNewService;
        $this->blogService = $blogService;
        $this->catProductService = $catProductService;
        $this->productService = $productService;
        $this->pagesService = $pagesService;
        $this->linksService = $linksService;
    }

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
        $query = TaskbarGroup::with('taskbars', 'description');

        $query->orderBy('sort_order', 'desc');
        if (isset($filter['filter']['order_by']) && isset($filter['filter']['order_direction'])) {
            $query->orderBy($filter['filter']['order_by'], $filter['filter']['order_direction']);
        }

        return $query->paginate($paginate);
    }

    public function getByGroup($filter, $paginate)
    {
        $query = Taskbar::with('description')
            ->where('taskbar_group_id', $filter['taskbar_group_id'])
            ->where('status', 1)->where('parent_id', 0);

        $query->orderBy('sort_order', 'asc');
        if (isset($filter['filter']['order_by']) && isset($filter['filter']['order_direction'])) {
            $query->orderBy($filter['filter']['order_by'], $filter['filter']['order_direction']);
        }

        return $query->get();
    }

    public function store($params)
    {
        if (isset($params['taskbar'])) {
            $params['taskbar']['column'] = 1;
            $params['taskbar']['store_id'] = 0;
            $params['taskbar']['name_id'] = isset($params['taskbar']['name_id']) ? $params['taskbar']['name_id'] : 0;
            $taskbar = Taskbar::create($params['taskbar']);
        }

        if (isset($params['taskbar_description'])) {
            $params['taskbar_description']['taskbar_id'] = $taskbar->taskbar_id;
            $params['taskbar_description']['language_id'] = 1;


            TaskbarDescription::create($params['taskbar_description']);
        }

        return $taskbar;
    }

    public function storeGroup($params)
    {
        if (isset($params['taskbar_group'])) {
            $taskbar = TaskbarGroup::create($params['taskbar_group']);
        }

        if (isset($params['taskbar_group_description'])) {
            $params['taskbar_group_description']['taskbar_group_id'] = $taskbar->taskbar_group_id;
            $params['taskbar_group_description']['language_id'] = 1;
            TaskbarGroupDescription::create($params['taskbar_group_description']);
        }

        return $taskbar;
    }

    public function edit($id)
    {
        return TaskbarGroup::with('taskbars', 'description')->findOrFail($id);
    }

    public function getTaskbar(int $taskbar_id)
    {
        return Taskbar::with('description')->findOrFail($taskbar_id);
    }

    public function update($params, $id)
    {
        if (isset($params['taskbar'])) {
            $taskbar = Taskbar::findOrFail($id);
            $taskbar->update($params['taskbar']);
        }

        if (isset($params['taskbar_description'])) {
            $taskbar_description = TaskbarDescription::where('taskbar_id', $id)->first();
            $taskbar_description->update($params['taskbar_description']);
        }

        return $id;
    }

    public function updateGroup($params, $id)
    {
        if (isset($params['taskbar_group_description'])) {
            TaskbarGroupDescription::where('taskbar_group_id', $id)->first()->update($params['taskbar_group_description']);
        }

        return $id;
    }

    public function destroy($id)
    {
        Taskbar::find($id)->delete();
        TaskbarDescription::where('taskbar_id', $id)->delete();
        Taskbar::where('parent_id', $id)->delete();

        return $id;
    }

    public function getTaskbarTypes($data = [], $status = false)
    {
        $results = [];
        foreach (Taskbar::TYPES as $taskbar) {
            if ($taskbar['status'] == 1) {
                $results[] = $taskbar;
            }
            if ($taskbar['status'] == 1 && isset($data['taskbar_type_id']) && $taskbar['taskbar_type_id'] == $data['taskbar_type_id']) {
                return $taskbar;
            }
        }

        return $results;
    }

    public function getTaskbarInfo($taskbar_id, $taskbar_type_id, $name_id)
    {
        $filter['taskbar_type_id'] = $taskbar_type_id;
        $taskbar = Taskbar::with('description')->findOrFail($taskbar_id);
        $taskbar_type = $this->getTaskbarTypes($filter);
        $route = $taskbar_type['route'];
        $data = [];
        // switch ($route) {
        //     case 'cat_news':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $info = $this->catNewService->edit($name_id);
        //         $href_name = 'lamy_house.blog.index';
        //         $href_prifix = seo_url($info->description->name);
        //         $attribute = '_self';

        //         break;
        //     case 'news':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $info = $this->blogService->edit($name_id);
        //         $href_name = 'lamy_house.blog.index';
        //         $href_prifix = seo_url($info->description->name);
        //         $attribute = '_self';

        //         break;
        //     case 'cat_product':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $info = $this->catProductService->detail($name_id);
        //         $href_name = 'lamy_house.product.index';
        //         $href_prifix = seo_url($info->description->name);
        //         $attribute = '_self';

        //         break;
        //     case 'product':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $info = $this->productService->edit($name_id);
        //         $href_name = 'lamy_house.product.index';
        //         $href_prifix = seo_url($info->description->name);
        //         $attribute = '_self';

        //         break;
        //     case 'internal':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $info = $this->linksService->edit($name_id);
        //         $href_name = 'lamy_house.internal.index';
        //         $href_prifix = seo_url($info->description->title);
        //         $attribute = '_self';

        //         break;
        //     case 'external':
        //         if (! strlen($name_id)) {
        //             $href_name = '';
        //             $href_prifix = '';
        //             $attribute = '';

        //             break;
        //         }

        //         $href_name = $name_id;
        //         $href_prifix = '';
        //         $attribute = '_self';

        //         break;
        //     case 'information':
        //         if (! strlen($name_id)) {
        //             $href = '';
        //             $attribute = '';
        //         }

        //         $info = $this->pagesService->edit($name_id);
        //         $href_name = 'lamy_house.information.index';
        //         $href_prifix = seo_url($info->description->title);
        //         $attribute = '_self';

        //         break;
        //     default:
        //         $href_name = '';
        //         $href_prifix = '';
        //         $attribute = '';
        // }

        return $data[] = [
            'taskbar_id' => $taskbar_id,
            'name' => isset($taskbar->description->name) ? $taskbar->description->name : '',
            'href_name' => isset($href_name) ? $href_name : '',
            'href_prifix' => isset($href_prifix) ? $href_prifix : '',
            'attribute' => isset($attribute) ? $attribute : '',
        ];
    }
}
