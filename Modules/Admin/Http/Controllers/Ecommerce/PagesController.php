<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Interfaces\PagesRepositoryInterface;

class PagesController extends Controller
{
    private $pagesService;

    public function __construct(PagesRepositoryInterface $pagesService)
    {
        $this->pagesService = $pagesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pagesService->getList(request()->all(), 20);

        return view('admin::ecommerce.pages.list', compact('pages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        $pages = $this->pagesService->getList(request()->all(), 20);
        $filter = request()->all();

        return view('admin::ecommerce.pages.list', compact('pages', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::ecommerce.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->pagesService->store($request->all());

        return redirect()->action([PagesController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pagesService->edit($id);

        return view('admin::ecommerce.pages.edit', compact('page'));
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
        $this->pagesService->update($request->all(), $id);

        return redirect()->action([PagesController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pagesService->destroy($id);

        return redirect()->action([PagesController::class, 'index'])->with('success', 'Xóa thành công');
    }

    public function destroyMultiple(Request $request)
    {
        foreach ($request->page_ids as $id) {
            $this->pagesService->destroy($id);
        }

        return response()->json(['success' => 'xóa trang nội dung thành công']);
    }
}
