<?php

namespace Modules\Admin\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use Modules\Blog\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\User\Models\User;

class BlogController extends Controller
{
    private $blogService;
    private $categoryService;

    public function __construct(BlogRepositoryInterface $blogService, CategoryRepositoryInterface $categoryService)
    {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogService->getList($request->all(), 20);
        $categories = $this->categoryService->getList($request->all(), 20);
        $users = User::all();

        return view('admin::post.blog.list', compact('blogs', 'categories', 'users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $blogs = $this->blogService->getList($request->all(), 20);
        $categories = $this->categoryService->getList($request->all(), 20);
        $users = User::all();
        $filter = $request->all();
        // pr($filter);
        return view('admin::post.blog.list', compact('blogs', 'categories', 'users', 'filter'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        return view('admin::post.blog.comment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = $this->categoryService->getList($request->all(), 20);

        return view('admin::post.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->blogService->store($request->all());

        return redirect()->action([BlogController::class, 'index'])->with('success', 'Thêm thành công');
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
        $blog = $this->blogService->edit($id);
        $categories = $this->categoryService->getList([], 20);

        return view('admin::post.blog.edit', compact('categories', 'blog'));
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
        $this->blogService->update($request->all(), $id);

        return redirect()->action([BlogController::class, 'index'])->with('success', 'Sửa thành công');
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
        if (isset($request->news_ids) && is_array($request->news_ids)) {
            foreach ($request->news_ids as $id) {
                $data['status'] = $request->status;
                $this->blogService->changeStatus($id, $data);
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
        foreach ($request->news_ids as $id) {
            $this->blogService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }

    public function ajaxList(Request $request)
    {
        $blogs = $this->blogService->getList($request->all(), 20);

        return response()->json($blogs);
    }
}
