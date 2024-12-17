<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariantRequest;
use Illuminate\Http\Request;
use Modules\Option\Repositories\Interfaces\OptionRepositoryInterface;

class VariantController extends Controller
{
    private $variantService;

    public function __construct(OptionRepositoryInterface $variantService)
    {
        $this->variantService = $variantService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = $this->variantService->getList($request->all(), 20);

        return view('admin::ecommerce.variant.list', ['options' => $options]);
    }

    public function filter(Request $request)
    {
        $options = $this->variantService->getList($request->all(), 20);
        $filter = $request->filter;

        return view('admin::ecommerce.variant.list', ['options' => $options, 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::ecommerce.variant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VariantRequest $request)
    {
        $this->variantService->store($request->all());

        return redirect()->action([VariantController::class, 'index'])->with('success', 'Thêm thành công');
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
        $option = $this->variantService->edit($id);

        return view('admin::ecommerce.variant.edit', ['option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VariantRequest $request, $id)
    {
        $this->variantService->update($request->all(), $id);

        return redirect()->action([VariantController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->variantService->destroy($id);

        return redirect()->action([VariantController::class, 'index'])->with('success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->variant_ids as $id) {
            $this->variantService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }
}
