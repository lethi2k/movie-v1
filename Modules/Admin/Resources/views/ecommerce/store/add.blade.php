@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới cửa hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới cửa hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.store.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\StoreController@store'),
            'name' => null,
            'fax' => null,
            'email' => null,
            'telephone' => null,
            'url' => null,
            'introduction' => null,
            'operating_time' => null,
            'comment' => null,
            'url_map' => null,
            'meta_title' => null,
            'meta_description' => null,
            'code_header' => null,
            'code_footer' => null,
            'address_id' => null,
            'address' => null,
            'logo' => asset('images/default.png'),
            

        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
    @include('admin::ecommerce.config.location_js',
    [
    'province_id' => 0,
    'district_id' => 0,
    'commune_id' => 0
    ]
    );
@endsection