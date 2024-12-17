<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerGroupRepositoryInterface;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private $customerService;
    private $customerGroupService;

    public function __construct(
        CustomerRepositoryInterface $customerService,
        CustomerGroupRepositoryInterface $customerGroupService
    ) {
        $this->customerService = $customerService;
        $this->customerGroupService = $customerGroupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = $this->customerService->getList($request->all(), 20);
        $groups = $this->customerGroupService->getList($request->all(), 20);
        $customer_group_id = 0;

        return view('admin::ecommerce.customer.list', compact('customers', 'groups', 'customer_group_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $customers = $this->customerService->getList($request->all(), 20);
        $groups = $this->customerGroupService->getList($request->all(), 20);
        $customer_group_id = 0;

        return view('admin::ecommerce.customer.list', compact('customers', 'groups', 'customer_group_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCustomerByGroup(Request $request)
    {
        $data = $request->all();
        $data['filter']['group']['customer_group_id'] = $request->customer_group_id;
        $customer_group_id = $request->customer_group_id;
        $customers = $this->customerService->getList($data, 20);
        $groups = $this->customerGroupService->getList($request->all(), 20);

        return view('admin::ecommerce.customer.list', compact('customers', 'groups', 'customer_group_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groups = $this->customerGroupService->getList($request->all(), 20);

        return view('admin::ecommerce.customer.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customerService->store($request->all());

        return redirect()->action([CustomerController::class, 'index'])->with('success', 'Thêm thành công');
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
        $customer = $this->customerService->edit($id);
        $groups = $this->customerGroupService->getList($request->all(), 20);

        return view('admin::ecommerce.customer.edit', ['customer' => $customer, 'groups' => $groups]);
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
        $this->customerService->update($request->all(), $id);

        return redirect()->action([CustomerController::class, 'index'])->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerService->destroy($id);

        return redirect()->action([CustomerController::class, 'index'])->with('success', 'Xóa thành công');
    }

    public function destroyMultiple(Request $request)
    {
        foreach ($request->customer_ids as $id) {
            $this->customerService->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }

    public function ajax(Request $request)
    {
        $data_customers = [];
        $filter['filter']['customer']['key'] = $request->column;
        $filter['filter']['customer']['value'] = $request->name;
        $customers = $this->customerService->getList($filter, 20);
        foreach ($customers as $customer_key => $customer) {
            $data_customers[$customer_key] = $customer;
            $data_customers[$customer_key]['address'] = [
                'address' => isset($customer->addressActive->address) ?? $customer->addressActive->address,
                'country' => isset($customer->addressActive->country->name) ?? $customer->addressActive->country->name,
                'province' => isset($customer->addressActive->province->name) ?? $customer->addressActive->province->name,
                'district' => isset($customer->addressActive->district->name) ?? $customer->addressActive->district->name,
                'commune' => isset($customer->addressActive->commune->name) ?? $customer->addressActive->commune->name,
            ];
        }

        return response()->json($data_customers);
    }

    public function address($customer_id, Request $request)
    {
        $this->customerService->address($request->all(), $customer_id);

        return redirect()->back()->with('success', 'Sửa địa chỉ thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAddress($id)
    {
        $this->customerService->destroyAddress($id);

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function checkName(Request $request)
    {
        $queryData = Customer::where('email', $request->customer['email']);
        $numberRecord = $queryData->count();
        echo $numberRecord == 0 ? "true" : "false";
    }
}
