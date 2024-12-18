<?php

namespace Modules\Admin\Http\Controllers\Ecommerce\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $categoryService;
    private $productService;

    public function __construct(
        CategoryRepositoryInterface $categoryService,
        ProductRepositoryInterface $productService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
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
}
