<?php

namespace Modules\Admin\Http\Controllers\Ecommerce\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Option\Repositories\Interfaces\OptionRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $categoryService;
    private $productService;
    private $variantService;

    public function __construct(
        CategoryRepositoryInterface $categoryService,
        ProductRepositoryInterface $productService,
        OptionRepositoryInterface $variantService,
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->variantService = $variantService;
    }

    public function index(Request $request)
    {
        $request->request->add(['is_not_trash' => true]);
        $categories = $this->categoryService->getList($request->all(), 100);
        $products = $this->productService->getList($request->all(), 20);

        return response()->json([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $product = $this->productService->store($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Thêm thành công',
            'product' => $product,
        ], 201);
    }

    public function edit($id)
    {
        $data = $this->productService->edit($id);
        $data_options = $this->getOption($data['options']);

        return response()->json([
            'product' => $data['product'],
            'category_parents' => $data['category_parents'],
            'manufacturers' => $data['manufacturers'],
            'options' => $data['options'],
            'options_json' => $data_options,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'message' => 'Sửa thành công',
            'product' => $product,
        ]);
    }

    public function destroy($id)
    {
        $this->productService->destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công',
        ]);
    }

    public function destroyMultiple(Request $request)
    {
        foreach ($request->product_ids as $id) {
            $this->productService->destroy($id);
        }

        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công',
        ]);
    }

    private function getOption($options)
    {
        $data_options = [];
        foreach ($options as $option) {
            $_values = $this->variantService->getValueByOption($option->option_id);
            $data_options[$option->option_id]['description'] = $option->description->toArray();
            $data_options[$option->option_id] = $option->toArray();
            $data_options[$option->option_id]['values'] = [];

            foreach ($_values as $key => $value) {
                $data_options[$option->option_id]['values'][$key]['description'] = $value->description->toArray();
                $data_options[$option->option_id]['values'][$key] = $value->toArray();
            }
        }

        return $data_options;
    }

    private function combinations($arrays, $i = 0)
    {
        if (!isset($arrays[$i])) {
            return [];
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }

        // get combinations from subsequent arrays
        $tmp = $this->combinations($arrays, $i + 1);

        $result = [];

        $dem = 0;
        // concat each array from tmp with each element from $arrays[$i]
        foreach ((array)$arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ? array_merge([$v], $t) : [$v, $t];
                if (isset($result[$dem]['text']) && !empty($result[$dem]['text'])) {
                    $result[$dem][] = [
                        'text' => $result[$dem]['text'],
                        'id' => $result[$dem]['id'],
                    ];

                    unset($result[$dem]['text']);
                    unset($result[$dem]['id']);
                }
                $dem++;
            }
        }


        return $result;
    }
}
