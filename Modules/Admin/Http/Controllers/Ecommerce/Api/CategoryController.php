<?php

namespace Modules\Admin\Http\Controllers\Ecommerce\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryRepositoryInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $params['is_not_trash'] = true;
        $categories = $this->categoryService->getList($params, 20);

        return response()->json(['categories' => $categories]);
    }

    /**
     * Display a listing of trashed resources.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trash(Request $request)
    {
        $params = $request->all();
        $params['status'] = '-1';
        $categories = $this->categoryService->getList($params, 20);

        return response()->json(['categories' => $categories, 'method' => 'trash']);
    }

    /**
     * Filter categories based on request parameters.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
        $categories = $this->categoryService->search($request->all());

        return response()->json(['categories' => $categories]);
    }

    /**
     * Store a newly created category.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request->all());

        return response()->json(['success' => 'Thêm thành công', 'category' => $category]);
    }

    /**
     * Show details of a category for editing.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $category = $this->categoryService->detail($id);
        $parents = $this->categoryService->getParent($id);

        return response()->json(['category' => $category, 'parents' => $parents]);
    }

    /**
     * Update the specified category.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryService->update($request->all(), $id);

        return response()->json(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified category.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return response()->json(['success' => 'Xóa thành công']);
    }

    /**
     * Change the status of multiple categories.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        if (isset($request->category_ids) && is_array($request->category_ids)) {
            foreach ($request->category_ids as $id) {
                $data['status'] = $request->status;
                $this->categoryService->changeStatus($id, $data);
            }
        }

        return response()->json(['success' => 'Sửa trạng thái thành công']);
    }

    /**
     * Remove multiple categories.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->category_ids as $id) {
            $this->categoryService->destroy($id);
        }

        return response()->json(['success' => 'Xóa danh mục thành công']);
    }
}
