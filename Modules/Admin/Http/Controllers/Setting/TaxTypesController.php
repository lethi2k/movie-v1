<?php

namespace Modules\Admin\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Interfaces\TaxRepositoryInterface;

class TaxTypesController extends Controller
{
    private $taxRepository;

    public function __construct(
        TaxRepositoryInterface $taxRepository
    ) {
        $this->taxRepository = $taxRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = $this->taxRepository->getList([], 10);

        return view('admin::setting.tax_types.list', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::setting.tax_types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->taxRepository->store($request->all());

        return redirect()->route('admin.setting.tax_types')->with('success', 'Tax type has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tax = $this->taxRepository->detail($id);

        return view('admin::setting.tax_types.edit', compact('tax'));
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
        $this->taxRepository->update($request->all(), $id);

        return redirect()->route('admin.setting.tax_types')->with('success', 'Tax type has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->taxRepository->destroy($id);

        return redirect()->route('admin.setting.tax_types')->with('success', 'Tax type has been deleted successfully');
    }
}
