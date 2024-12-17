<?php

namespace Modules\Attribute\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Http\Requests\AttributeRequest;
use Modules\Attribute\Repositories\Interfaces\AttributeRepositoryInterface as AttributeInterface;

class AttributeController extends Controller
{
    private $attributeService;

    public function __construct(AttributeInterface $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attributes = $this->attributeService->getList($request->all(), 20);

        return view('admin.ecommerce.attribute.list', ['attributes' => $attributes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $attributes = $this->attributeService->getList($request->all(), 20);
        $filter = $request->filter;

        return view('admin.ecommerce.attribute.list', ['attributes' => $attributes, 'filter' => $filter]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('admin.ecommerce.attribute.detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroup()
    {
        return view('admin.ecommerce.attribute.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ecommerce.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $this->attributeService->store($request->all());

        return redirect()->action([AttributeController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->attributeService->edit($id);

        return view('admin.ecommerce.attribute.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $this->attributeService->update($request->all(), $id);

        return redirect()->action([AttributeController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->attributeService->destroy($id);

        return redirect()->action([AttributeController::class, 'index'])->with('success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->attribute_ids as $id) {
            $this->attributeService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $filter = [];
        $filter['filter']['key'] = 'name';
        $filter['filter']['value'] = $request->filter_name;

        $json = [];
        if (isset($request->filter_name)) {
            $results = $this->attributeService->getListAttr($filter, 20);
            foreach ($results as $result) {
                $json[] = [
                    'attribute_id' => $result->attribute_group_id,
                    'name' => $result->description->name,
                ];
            }

            header('Content-Type: application/json');

            return response()->json($json);
        }
    }
}
