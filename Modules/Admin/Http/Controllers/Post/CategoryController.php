<?php

namespace Modules\Admin\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\Interfaces\CategoryRepositoryInterface;

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
        $categories = $this->categoryService->getList($request->all(), 20);

        return view('admin::post.category.list', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $categories = $this->categoryService->getList($request->all(), 20);
        $filter = $request->all();

        return view('admin::post.category.list', compact('categories', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->categoryService->getList([], 1000);

        return view('admin::post.category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categoryService->store($request->all());

        if (isset($request->model)) {
            return redirect()->back()->with('success', 'Thêm thành công');
        }

        return redirect()->action([CategoryController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->edit($id);
        $parents = $this->categoryService->getParent($id);

        return view('admin::post.category.edit', compact('category', 'parents'));
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
        //
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

    public function ajaxList(Request $request)
    {
        $categories = $this->categoryService->getList($request->all(), 20);

        return response()->json($categories);
    }
}
