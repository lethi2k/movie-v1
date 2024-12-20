<?php

namespace Modules\Product\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Support\Facades\DB;
use Modules\Category\Repositories\CategoryRepository;

//use Model
use Modules\Core\Models\UrlAlias;
use Modules\Manufacturer\Repositories\ManufacturerRepository;
use Modules\Option\Repositories\OptionRepository;
use Modules\Product\Models\Attribute;
use Modules\Product\Models\Category;
use Modules\Product\Models\Description;
use Modules\Product\Models\Image;
use Modules\Product\Models\Option;

//use Repository
use Modules\Product\Models\Product;
use Modules\Product\Models\Store;
use Modules\Product\Models\Tag;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $categoryService;
    protected $manufacturerService;
    protected $variantService;

    public function __construct(
        CategoryRepository $categoryService,
        ManufacturerRepository $manufacturerService,
        OptionRepository $variantService
    ) {
        $this->categoryService = $categoryService;
        $this->manufacturerService = $manufacturerService;
        $this->variantService = $variantService;
    }

    public function getList($filter, $paginate)
    {
        $productQuery = Product::with('description', 'categories', 'categories.category.description', 'tags.info')
            ->where('parent_id', '=', Product::PARENT_DEFAULT);

        if (isset($filter['filter']['product_ids'])) {
            $productQuery->whereIn('product_id', $filter['filter']['product_ids']);
        }

        if (isset($filter['filter']['price'])) {
            $filter_prices = explode("OR", $filter['filter']['price']);

            foreach ($filter_prices as $key => $filter_price) {
                $f_p = explode("=", $filter_price);
                if ($key == 0) {
                    $productQuery->where('price', $f_p[0], $filter_price[1]);
                } else {
                    $productQuery->orWhere('price', $f_p[0], $filter_price[1]);
                }
            }
        }

        if (isset($filter['filter']['not_product_id'])) {
            $productQuery->where('product_id', '<>', $filter['filter']['not_product_id']);
        }

        if (isset($filter['filter']['countries'])) {
            $productQuery->whereIn('location', $filter['filter']['countries']);
        }

        if (isset($filter['filter']['years'])) {
            $productQuery->whereIn('year_manufacture', $filter['filter']['years']);
        }

        //filter description
        if (isset($filter['filter']['product']['key']) && isset($filter['filter']['product']['value'])) {
            $productQuery->whereHas('description', function ($query) use ($filter) {
                $query->where($filter['filter']['product']['key'], 'LIKE', '%' . $filter['filter']['product']['value'] . '%');
            });
        }

        //filter category
        if (isset($filter['filter']['category']['category_id']) && $filter['filter']['category']['category_id'] !== Category::LIST_ALL) {
            $productQuery->WhereHas('categories', function ($query) use ($filter) {
                $query->where('category_id', $filter['filter']['category']['category_id']);
            });
        }

        //filter categories
        if (isset($filter['filter']['categories']) && !empty($filter['filter']['categories'])) {
            $productQuery->WhereHas('categories', function ($query) use ($filter) {
                $query->whereIn('category_id', $filter['filter']['categories']);
            });
        }

        if (isset($filter['filter']['limit'])) {
            return $productQuery->orderBy('product_id', 'asc')->limit($filter['filter']['limit'])->get();
        }

        if (isset($filter['filter']['sort']) && isset($filter['filter']['order_by'])) {
            if ($filter['filter']['sort'] == 'name') {
                $productQuery->whereHas('description', function ($query) use ($filter) {
                    $query->orderBy($filter['filter']['sort'], $filter['filter']['order_by']);
                });
            } else {
                $productQuery->orderBy($filter['filter']['sort'], $filter['filter']['order_by']);
            }
        } else {
            $productQuery->orderBy('product_id', 'desc');
        }

        $products = $productQuery->paginate($paginate);

        return $products;
    }

    public function store($params)
    {
        DB::beginTransaction();
        try {
            // product
            if (isset($params['product'])) {
                $params['product'] = array_map(function ($v) {
                    return (is_null($v)) ? 0 : $v;
                }, $params['product']);

                $params['product']['model'] = gen_model($params['product']);
                $params['product']['status'] = $params['product']['status'] == 'active' ? 1 : 0;
                $params['product']['user_id'] = auth()->guard('admin')->user()->user_id ?? 1;

                $product = Product::create($params['product']);
                $product_id = $product->product_id;
            }

            // Url seo
            if (isset($params['product_description']['meta_keyword']) && strlen($params['product_description']['meta_keyword'])) {
                UrlAlias::where('query', 'product_id=' . $product_id)->delete();
                UrlAlias::create([
                    'query' => 'product_id=' . $product_id,
                    'keyword' => $params['product_description']['meta_keyword'],
                    'language_id' => 1,
                ]);
            }

            // description
            if (isset($params['product_description'])) {
                $params['product_description']['description_short'] = html_entity_decode(strip_tags($params['product_description']['description']));
                $params['product_description']['product_id'] = $product_id;
                $params['product_description'] = array_map(function ($v) {
                    return (is_null($v)) ? "" : $v;
                }, $params['product_description']);

                $params['product_description']['meta_title'] = url_title($params['product_description']['meta_keyword']);
                $meta_description = html_entity_decode(strip_tags($params['product_description']['description_short']));
                $params['product_description']['meta_description'] = Str::of($meta_description)->limit(200)->__toString();

                if (is_array($params['product_description']['tag'])) {
                    $params['product_description']['tag'] = implode(',', $params['product_description']['tag']);
                }

                Description::create($params['product_description']);
            }

            if (isset($params['product_option'])) {
                foreach ($params['product_option'] as $product_option) {
                    Option::create([
                        'product_id' => $product_id,
                        'episode' => $product_option['episode'] ?? '',
                        'value' => $product_option['value'] ?? ''
                    ]);
                }
            }

            //tags
            if (!empty($params['product_tag'])) {
                $tags = array_map(function ($product_tag) use ($product_id) {
                    return [
                        'product_id' => $product_id,
                        'tag_id' => $product_tag,
                    ];
                }, $params['product_tag']);

                Tag::insert($tags);
            }

            //category
            if (isset($params['product_category'])) {
                foreach ($params['product_category'] as $category) {
                    $category['product_id'] = $product_id;
                    $category['category_id'] = $category['category_id'];
                    Category::create($category);
                }
            }

            //attribute
            if (isset($params['product_attribute'])) {
                foreach ($params['product_attribute'] as $attribute) {
                    $attribute['language_id'] = 1;
                    $attribute['product_id'] = $product_id;
                    Attribute::create($attribute);
                }
            }

            //image
            if (isset($params['product_image'])) {
                foreach ($params['product_image'] as $image) {
                    $image['product_id'] = $product_id;
                    $image['sort_order'] = 0;
                    Image::create($image);
                }
            }

            // variant
            if (isset($params['product_variant']['status']) && $params['product_variant']['status'] == 'active') {
                unset($params['product_variant']['status']);
                $this->addVariantProduct($params['product_variant'], $product_id, $product->toArray());
                $product->update(['parent_id' => -1]);
            }
            DB::commit();
            return $product;
        } catch (Throwable $exception) {
            DB::rollBack();
            Log::error('Create product failed: ' . $exception->getMessage() . $exception->getLine());
            return false;
        }
    }

    public function edit(int $id)
    {
        $category_parents = $this->categoryService->getList([], 100);
        $manufacturers = $this->manufacturerService->getList([], 100);
        $options = $this->variantService->getList([], 100);
        $product = Product::with('description', 'categories', 'categories.category.description', 'options', 'tags.info')->findOrFail($id);

        return [
            'category_parents' => $category_parents,
            'manufacturers' => $manufacturers,
            'options' => $options,
            'product' => $product,
        ];
    }

    public function update(array $params, int $id)
    {
        //update product
        if (isset($params['product'])) {
            $product_model = Product::findOrFail($id);
            $column_formats = ['price', 'market_price'];
            foreach ($column_formats as $column_format) {
                if (isset($params['product'][$column_format])) {
                    $params['product'][$column_format] = intval(str_replace(',', '', $params['product'][$column_format]));
                }
            }

            // $params['product']['manufacturer_id'] = (! isset($params['product']['manufacturer_id']) || ! strlen($params['product']['manufacturer_id'])) ? 0 : $params['product']['manufacturer_id'];
            $params['product']['status'] = $params['product']['status'] == 'active' ? 1 : 0;
            $product_model->update($params['product']);
        }

        //update product image
        if (isset($params['product_image'])) {
            Image::where('product_id', $id)->delete();
            foreach ($params['product_image'] as $image) {
                $image['product_id'] = $id;
                $image['sort_order'] = 0;
                Image::create($image);
            }
        }

        //update product option
        if (isset($params['product_option'])) {
            Option::where('product_id', $id)->delete();
            foreach ($params['product_option'] as $product_option) {
                Option::create([
                    'product_id' => $id,
                    'value' => $product_option['value'] ?? '',
                    'episode' => $product_option['episode'] ?? ''
                ]);
            }
        }

        //attribute
        if (isset($params['product_attribute'])) {
            Attribute::where('product_id', $id)->delete();
            foreach ($params['product_attribute'] as $attribute) {
                $attribute['language_id'] = 1;
                $attribute['product_id'] = $id;
                Attribute::create($attribute);
            }
        }

        //update product tags
        if (!empty($params['product_tag'])) {
            Tag::where('product_id', $id)->delete();
            $tags = array_map(function ($product_tag) use ($id) {
                return [
                    'product_id' => $id,
                    'tag_id' => $product_tag,
                ];
            }, $params['product_tag']);

            Tag::insert($tags);
        }

        //category
        if (isset($params['product_category'])) {
            Category::where('product_id', $id)->delete();
            foreach ($params['product_category'] as $category) {
                $category['product_id'] = $id;
                Category::create($category);
            }
            // $categories = $product_model->categories;

            // if ($categories->count() > 0) {
            //     $category_ids = array_map(function ($v) {
            //         return $v['category_id'];
            //     }, $params['product_category']);

            //     foreach ($categories as $category) {
            //         if (!in_array($category->category_id, $category_ids)) {
            //             $category['product_id'] = $id;
            //             Category::create($category);
            //         };
            //     }
            // }

            // if ($categories->count() <= 0) {
            //     foreach ($params['product_category'] as $category) {
            //         $category['product_id'] = $id;
            //         Category::create($category);
            //     }
            // }
        }

        // description
        if (isset($params['product_description'])) {
            $params['product_description']['product_id'] = $id;
            $params['product_description'] = array_map(function ($v) {
                return (is_null($v)) ? "" : $v;
            }, $params['product_description']);

            if (is_array($params['product_description']['tag'])) {
                $params['product_description']['tag'] = implode(',', $params['product_description']['tag']);
            }

            $params['product_description']['meta_title'] = url_title($params['product_description']['meta_keyword']);
            $meta_description = html_entity_decode(strip_tags($params['product_description']['description']));
            $params['product_description']['meta_description'] = Str::of($meta_description)->limit(200)->__toString();

            $product_description_model = Description::findOrFail($id);
            $product_description_model->update($params['product_description']);
        }

        //url seo
        if (isset($params['product_description']['meta_keyword']) && strlen($params['product_description']['meta_keyword'])) {
            $slug = UrlAlias::where('query', 'product_id=' . $id)->count();
            if ($slug > 0) {
                UrlAlias::where('query', 'product_id=' . $id)->update([
                    'keyword' => $params['product_description']['meta_keyword'],
                ]);
            }

            if ($slug == 0) {
                UrlAlias::create([
                    'query' => 'product_id=' . $id,
                    'keyword' => $params['product_description']['meta_keyword'],
                    'language_id' => 1,
                ]);
            }
        }

        return $id;
    }

    public function destroy($product_id)
    {
        $variants = Product::where('parent_id', $product_id)->get();
        if (count($variants)) {
            foreach ($variants as $variant) {
                Option::where('product_id', $variant->product_id)->delete();
                $variant->delete();
            }
        }

        Category::where('product_id', $product_id)->delete();
        Attribute::where('product_id', $product_id)->delete();
        Image::where('product_id', $product_id)->delete();
        Option::where('product_id', $product_id)->delete();
        Product::find($product_id)->delete();
        Description::find($product_id)->delete();
        UrlAlias::where('query', 'product_id=' . $product_id)->delete();
    }

    public function getProductVariant($parent_id)
    {
        return Product::where('parent_id', $parent_id)->orWhere('parent_id', '>', 0)->offset(0)->limit(100)->get();
    }

    public function getListProductVariant()
    {
        return Product::where('parent_id', Product::PARENT_DEFAULT)->get();
    }

    protected function addVariantProduct(array $product_variant, int $product_id, array $product)
    {
        foreach ($product_variant as $variant) {
            if (!strlen($variant['model'])) {
                $variant['model'] = gen_model($variant);
            }

            $variant = array_map(function ($v) {
                return (is_null($v)) ? 0 : $v;
            }, $variant);

            $variant['parent_id'] = $product_id;
            $variant = array_replace($product, $variant);
            unset($variant['product_id']);

            $product_variant = Product::create($variant);
            $product_variant_id = $product_variant->product_id;

            $product_option = [];
            $option_values = explode(',', $variant['option_pair']);

            if (!is_array($option_values)) {
                $_option_value = explode('-', $option_values);
                $product_option['product_id'] = $product_variant_id;
                $product_option['option_id'] = $_option_value[0];
                $product_option['option_value_id'] = $_option_value[1];
                $product_option['value'] = '';
                $product_option['required'] = 1;
                Option::create($product_option);
            }

            if (is_array($option_values)) {
                foreach ($option_values as $option_value) {
                    $_option_value = explode('-', $option_value);
                    $product_option['product_id'] = $product_variant_id;
                    $product_option['option_id'] = $_option_value[0];
                    $product_option['option_value_id'] = $_option_value[1];
                    $product_option['value'] = '';
                    $product_option['required'] = 1;
                    Option::create($product_option);
                }
            }
        }
    }
}
