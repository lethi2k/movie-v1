<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use Modules\Blog\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface as CategoryProductRepositoryInterface;
use Modules\Core\Repositories\Interfaces\LinksRepositoryInterface;
use Modules\Core\Repositories\Interfaces\MenusRepositoryInterface;
use Modules\Core\Repositories\Interfaces\PagesRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class LinksController extends Controller
{
    private $menusService;
    private $catNewService;
    private $blogService;
    private $catProductService;
    private $productService;
    private $pagesService;
    private $linksService;

    public function __construct(
        MenusRepositoryInterface $menusService,
        CategoryRepositoryInterface $catNewService,
        BlogRepositoryInterface $blogService,
        CategoryProductRepositoryInterface $catProductService,
        ProductRepositoryInterface $productService,
        PagesRepositoryInterface $pagesService,
        LinksRepositoryInterface $linksService
    ) {
        $this->menusService = $menusService;
        $this->catNewService = $catNewService;
        $this->blogService = $blogService;
        $this->catProductService = $catProductService;
        $this->productService = $productService;
        $this->pagesService = $pagesService;
        $this->linksService = $linksService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->menusService->getList(request()->all(), 20);

        return view('admin::ecommerce.links.list', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::ecommerce.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menusService->store($request->all());

        return redirect()->back()->with('success', 'Tạo mới thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGroup(Request $request)
    {
        $this->menusService->storeGroup($request->all());

        return redirect()->action([LinksController::class, 'index'])->with('success', 'Tạo mới thành công');
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
    public function edit($id, Request $request)
    {
        $group = $this->menusService->edit($id);
        $taskbar_types = json_decode(json_encode($this->menusService->getTaskbarTypes([], true)), false);

        if (isset($request->taskbar_id)) {
            $taskbar_infor = $this->menusService->getTaskbar($request->taskbar_id);

            return view('admin::ecommerce.links.edit', compact('group', 'taskbar_types', 'taskbar_infor'));
        }

        return view('admin::ecommerce.links.edit', compact('group', 'taskbar_types'));
    }

    public function ajaxGetTaskbarType(Request $request)
    {
        $output = [];
        $store_id = 0;

        $taskbar_type_info = $this->menusService->getTaskbarTypes(['taskbar_type_id' => $request->taskbar_type_id], true);

        switch ($taskbar_type_info['route']) {
            case 'cat_news':
                $datas = $this->catNewService->getList($request->all(), 100);

                // foreach ($datas as $data) {
                //     if ($this->model_taskbar_taskbar->checkInStore('cat_news', $data['category_id'], $store_id) == true) {
                //         $output[] = $data;
                //     }
                // }

                $json = [
                    'data' => $datas,
                    'route' => 'category_id',
                ];

                break;
            case 'news':
                $datas = $this->blogService->getList($request->all(), 100);
                $json = [
                    'data' => $datas,
                    'route' => 'news_id',
                ];

                break;
            case 'video':
                # code...
                break;
            case 'cat_product':
                $datas = $this->catProductService->getList($request->all(), 100);
                $json = [
                    'data' => $datas,
                    'route' => 'category_id',
                ];

                break;
            case 'product':
                $datas = $this->productService->getList($request->all(), 100);
                $json = [
                    'data' => $datas,
                    'route' => 'product_id',
                ];

                break;
            case 'internal':
                $json = [
                    'data' => $this->linksService->getList($request->all(), 100),
                    'route' => 'link_internal_id',
                ];

                break;
            case 'external':
                $json = [
                    'data' => [],
                    'route' => 'link_external_id',
                ];

                break;
            case 'information':
                $datas = $this->pagesService->getList($request->all(), 100);
                $json = [
                    'data' => $datas,
                    'route' => 'information_id',
                ];

                break;

            default:
                $json['error'] = true;

                break;
        }

        return response()->json($json);
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
        $this->menusService->update($request->all(), $id);

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menusService->destroy($id);

        return redirect()->back();
    }

    public function updateGroup(Request $request, $id)
    {
        $this->menusService->updateGroup($request->all(), $id);

        return redirect()->action([LinksController::class, 'index'])->with('success', 'Sửa thành công');
    }
}
