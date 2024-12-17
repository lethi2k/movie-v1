@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sửa nhà cung cấp</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sửa nhà cung cấp</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.supplier.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\SupplierController@update', ['id' => $supplier->supplier_id]),
        'supplier_model' => $supplier->model,
        'name' => $supplier->name,
        'phone' => $supplier->phone,
        'email' => $supplier->email,
        'company' => $supplier->company,
        'fax' => $supplier->fax,
        'address' => $supplier->address,
        'note' => $supplier->note,
        'branch' => $supplier->branch,
        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.supplier.js')
@include('admin::ecommerce.config.location_js',
    [
        'province_id' => $supplier->province_id,
        'district_id' => $supplier->district_id,
        'commune_id' => $supplier->commune_id
    ]
)
@endsection