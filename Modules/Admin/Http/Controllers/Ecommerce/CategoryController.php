<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $params['is_not_trash'] = true;
        $categories = $this->categoryService->getList($params, 20);

        return view('admin::ecommerce.category.list', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request)
    {
        $params = $request->all();
        $params['status'] = '-1';
        $categories = $this->categoryService->getList($params, 20);
        $method = 'trash';

        return view('admin::ecommerce.category.list', compact('categories', 'method'));
    }

    public function detail($id)
    {
        $category = $this->categoryService->detail($id);
        $parents = $this->categoryService->getParent($id);

        return view('admin::ecommerce.category.detail', ['category' => $category, 'parents' => $parents]);
    }

    public function filter(Request $request)
    {
        $categories = $this->categoryService->search($request->all());

        return response()->json($categories);
    }

    public function ajaxList(Request $request)
    {
        $params = $request->all();
        $params['is_not_trash'] = true;
        $categories = $this->categoryService->getList($params, 20);

        return response()->json($categories);
    }

    public function parent_id(Request $request)
    {
        $parents = $this->categoryService->getParent($request->id);

        return response()->json($parents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->categoryService->getList([], 1000);

        return view('admin::ecommerce.category.create', ['parents' => $parents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request->all());

        if (isset($request->model)) {
            return redirect()->back()->with('success', 'Thêm thành công');
        }

        return redirect()->action([CategoryController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->detail($id);
        $parents = $this->categoryService->getParent($id);

        return view('admin::ecommerce.category.edit', ['category' => $category, 'parents' => $parents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryService->update($request->all(), $id);

        return redirect()->action([CategoryController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return redirect()->action([CategoryController::class, 'index'])->with('success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        if (isset($request->category_ids) && is_array($request->category_ids)) {
            foreach ($request->category_ids as $id) {
                $data['status'] = $request->status;
                $this->categoryService->changeStatus($id, $data);
            }
        }

        return response()->json(['success' => 'sửa trạng thái thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->category_ids as $id) {
            $this->categoryService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }
}
