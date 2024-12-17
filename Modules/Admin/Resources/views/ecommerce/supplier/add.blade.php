@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới nhà cung cấp</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới nhà cung cấp</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.supplier.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\SupplierController@store'),
        'supplier_model' => null,
        'name' => null,
        'phone' => null,
        'email' => null,
        'company' => null,
        'fax' => null,
        'address' => null,
        'note' => null,
        'branch' => null,
        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.supplier.js');
@include('admin::ecommerce.config.location_js',
[
'province_id' => 0,
'district_id' => 0,
'commune_id' => 0
]
);
@endsection