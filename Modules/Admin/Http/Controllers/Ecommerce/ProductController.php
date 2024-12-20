<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Manufacturer\Repositories\Interfaces\ManufacturerRepositoryInterface;
use Modules\Option\Repositories\Interfaces\OptionRepositoryInterface;

use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $categoryService;
    private $manufacturerService;
    private $variantService;
    private $productService;

    public function __construct(
        CategoryRepositoryInterface $categoryService,
        ManufacturerRepositoryInterface $manufacturerService,
        OptionRepositoryInterface $variantService,
        ProductRepositoryInterface $productService
    ) {
        $this->categoryService = $categoryService;
        $this->manufacturerService = $manufacturerService;
        $this->variantService = $variantService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $request->request->add(['is_not_trash' => true]);
        $categories = $this->categoryService->getList($request->all(), 100);
        $products = $this->productService->getList($request->all(), 20);

        return view('admin::ecommerce.product.list', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        return view('admin::ecommerce.product.comment');
    }

    public function filter(Request $request)
    {
        $categories = $this->categoryService->getList($request->all(), 100);
        $products = $this->productService->getList($request->all(), 20);
        $filter = $request->filter;

        return view('admin::ecommerce.product.list', ['products' => $products, 'categories' => $categories, 'filter' => $filter]);
    }

    public function ajax(Request $request)
    {
        $filter['filter']['product']['key'] = $request->column;
        $filter['filter']['product']['value'] = $request->name;
        $products = $this->productService->getList($filter, 20);

        return response()->json($products);
    }

    public function ajaxList()
    {
        $products = $this->productService->getList([], 100);

        return response()->json($products);
    }

    public function create()
    {
        $category_parents = $this->categoryService->getList([], 100);
        $manufacturers = $this->manufacturerService->getList([], 100);
        $options = $this->variantService->getList([], 100);
        $data_options = $this->getOption($options);

        return view('admin::ecommerce.product.add', [
            'parents' => $category_parents,
            'manufacturers' => $manufacturers,
            'options' => $options,
            'options_json' => json_encode($data_options),
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        // ProductRequest
        $this->productService->store($request->all());
        return redirect()->action([ProductController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->productService->edit($id);
        $data_options = $this->getOption($data['options']);

        return view('admin::ecommerce.product.edit', [
            'parents' => $data['category_parents'],
            'product' => $data['product'],
            'manufacturers' => $data['manufacturers'],
            'options' => $data['options'],
            'options_json' => json_encode($data_options),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productService->update($request->all(), $id);

        return redirect()->action([ProductController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->destroy($id);

        return redirect()->action([ProductController::class, 'index'])->with('success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->product_ids as $id) {
            $this->productService->destroy($id);
        }

        return response()->json(['success' => 'xóa sản phẩm thành công']);
    }

    public function ajaxVariant(Request $request)
    {
        $data_tags = json_decode($request->data_tag);
        $data_tags = json_decode(json_encode($data_tags), true);

        foreach ($data_tags as $key => $data_tag) {
            if (empty($data_tag)) {
                unset($data_tags[$key]);
            }
        }

        $data_variants = $this->combinations(array_values($data_tags));
        $option_datas = [];

        foreach ($data_variants as $key => $data_variant) {

            //one value
            if (isset($data_variant['text']) && strlen($data_variant['text'])) {
                $option_datas[$key]['option_value_name'] = $data_variant['text'];
                $option_datas[$key]['option_value_id'] = $data_variant['id'];
            }

            //mutical value
            if (!isset($data_variant['text'])) {
                $value_names = [];
                $value_ids = [];
                for ($i = 0; $i < count($data_variant); $i++) {
                    if (isset($data_variant[$i]['text'])) {
                        $value_names[$i] = $data_variant[$i]['text'];
                        $value_ids[$i] = $data_variant[$i]['id'];
                    }
                }

                $option_datas[$key]['option_value_name'] = implode('/', $value_names);
                $option_datas[$key]['option_value_id'] = implode(',', $value_ids);
            }
        }

        $html_variants = view('admin::ecommerce.product.variant_content', [
            'option_datas' => $option_datas,
        ])->render();

        return response()->json(['html_variants' => $html_variants]);
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

    public function variant($parent_id, $id)
    {
        $parent_product = $this->productService->edit($parent_id);
        $variant = $this->productService->edit($id);

        return view('admin::ecommerce.product.variant_detail', [
            'parent_id' => $parent_id,
            'parent_product' => $parent_product['product'],
            'variant' => $variant['product'],
            'variant_id' => $id,
            'options' => $variant['options'],
        ]);
    }

    public function updateVariant($parent_id, $id, Request $request)
    {
        $this->productService->update($request->all(), $id);

        return redirect()->action([ProductController::class, 'variant'], ['parent_id' => $parent_id, 'id' => $id])->with('success', 'cập nhập biến thể thành công');
    }
}
