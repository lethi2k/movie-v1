<?php

namespace Modules\Layout\Repositories;

use Modules\Blog\Models\Categories\Category as CategoriesCategory;
use Modules\Blog\Models\News\News;
use Modules\Category\Models\Category;
use Modules\Layout\Models\Extension;
use Modules\Layout\Repositories\Interfaces\ExtensionRepositoryInterface;
use Modules\Product\Models\Product;

class ExtensionRepository implements ExtensionRepositoryInterface
{
    public function getByType($type)
    {
        return Extension::where('type', $type)->orderBy('extension_id', 'DESC')->get();
    }

    public function initModule($type, $extension_id)
    {
        switch ($type) {
            case 'news_custom':
                $data = $this->newsCustom();

                break;
            case 'product_category':
                $data = $this->productCategory();

                break;
            case 'callnow':
                $data = $this->callnow();

                break;
            case 'filter':
                $data = $this->filter();

                break;
            case 'product_custom':
                $data = $this->productCustom();

                break;
            case 'product_tab':
                $data = $this->productTab();

                break;
            case 'service':
                $data = $this->service();

                break;
            case 'gallery':
                $data = $this->gallery();

                break;
            case 'visualbuilder':
                $data = $this->visualbuilder();

                break;

            default:
                throw new \Exception('Unknown Module type ');
        }

        return $data;
    }

    public function newsCustom()
    {
    }

    public function productCategory()
    {
    }

    public function callnow()
    {
    }

    public function filter()
    {
        return [
            'extensions' => [
                'products' => Product::EXTENSIONS,
                'category_products' => Category::EXTENSIONS,
                'news' => News::EXTENSIONS,
                'category_news' => CategoriesCategory::EXTENSIONS,
            ],
            'view' => 'admin::ecommerce.themes.extension.filter',
        ];
    }

    public function productCustom()
    {
    }

    public function productTab()
    {
    }

    public function service()
    {
        return [
            'view' => 'admin::ecommerce.themes.extension.service',
        ];
    }

    public function gallery()
    {
        return [
            'view' => 'admin::ecommerce.themes.extension.gallery',
        ];
    }

    public function visualbuilder()
    {
    }
}
