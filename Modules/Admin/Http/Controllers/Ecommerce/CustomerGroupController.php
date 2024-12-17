<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Customer\Repositories\Interfaces\CustomerGroupRepositoryInterface;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerGroupController extends Controller
{
    private $customerGroupService;
    private $customerService;

    public function __construct(
        CustomerGroupRepositoryInterface $customerGroupService,
        CustomerRepositoryInterface $customerService
    ) {
        $this->customerGroupService = $customerGroupService;
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = $this->customerGroupService->getList($request->all(), 20);

        return view('admin::ecommerce.customer_group.list', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::ecommerce.customer_group.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAuto()
    {
        return view('admin::ecommerce.customer_group.create_auto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAuto(Request $request)
    {
        $this->customerGroupService->store($request->all());

        return redirect()->action([CustomerGroupController::class, 'index'])->with('success', 'Thêm thành công');
    }

    public function filterAuto(Request $request)
    {
        unset($request->_token);
        $filter['filter']['filter_by_type'] = $request->all();
        $customers = $this->customerService->getList($request->all(), 20);

        return response()->json($customers);
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customerGroupService->store($request->all());

        return redirect()->action([CustomerGroupController::class, 'index'])->with('success', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->customerGroupService->detail($id);

        return view('admin::ecommerce.customer_group.edit', ['group' => $group]);
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
        $this->customerGroupService->update($request->all(), $id);

        return redirect()->action([CustomerGroupController::class, 'index'])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerGroupService->destroy($id);

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
