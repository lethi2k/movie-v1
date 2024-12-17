<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use Illuminate\Http\Request;
use Modules\Manufacturer\Repositories\Interfaces\ManufacturerRepositoryInterface;

class ManufacturerController extends Controller
{
    private $manufacturerService;

    public function __construct(ManufacturerRepositoryInterface $manufacturer)
    {
        $this->manufacturerService = $manufacturer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manufacturers = $this->manufacturerService->getList($request->all(), 20);

        return view('admin::ecommerce.manufacturer.list', ['manufacturers' => $manufacturers]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $manufacturers = $this->manufacturerService->getList($request->all(), 20);
        $filter = $request->filter;

        return view('admin::ecommerce.manufacturer.list', ['manufacturers' => $manufacturers, 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::ecommerce.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $this->manufacturerService->store($request->all());

        if (isset($request->model)) {
            return redirect()->back()->with('success', 'Thêm thành công');
        }

        return redirect()->action([ManufacturerController::class, 'index'])->with('success', 'Thêm thành công');
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
        $manufacturer = $this->manufacturerService->edit($id);

        return view('admin::ecommerce.manufacturer.edit', ['manufacturer' => $manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerRequest $request, $id)
    {
        $this->manufacturerService->update($request->all(), $id);

        return redirect()->action([ManufacturerController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->manufacturerService->destroy($id);

        return redirect()->action([ManufacturerController::class, 'index'])->with('success', 'Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiple(Request $request)
    {
        foreach ($request->manufacturer_ids as $id) {
            $this->manufacturerService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }
}
