<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Modules\Warehouses\Repositories\Interfaces\PriceAdjustmentRepositoryInterface;

class PriceAdjustmentsController extends Controller
{
    private $priceAdjustmentsService;
    private $productService;

    public function __construct(
        PriceAdjustmentRepositoryInterface $priceAdjustmentsService,
        ProductRepositoryInterface $productService
    ) {
        $this->priceAdjustmentsService = $priceAdjustmentsService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wh_price_adjustments = $this->priceAdjustmentsService->getList($request->all(), 20);

        return view('admin::ecommerce.price_adjustments.list', compact('wh_price_adjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request('product_id')) {
            $product_id = request('product_id');
            $data_product_service = $this->productService->edit($product_id);
            $product = $data_product_service['product'];

            $option_name = collect($product['options'])->map(function ($options) {
                return $options->optionValue->description->name;
            })->toArray();

            $option_name = implode(", ", $option_name);
            $option_name = strlen($option_name) ? ' - '. $option_name : $option_name;

            return view('admin::ecommerce.price_adjustments.create', compact('product', 'option_name'));
        }

        return view('admin::ecommerce.price_adjustments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->priceAdjustmentsService->store($request->all());

        return redirect()->action([PriceAdjustmentsController::class, 'index'])->with('success', 'Thêm thành công');
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
        //
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
        //
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
}
