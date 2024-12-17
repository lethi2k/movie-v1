@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.variant.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@store'),
            'name' => null,
            'type' => 'Radio',
            'option_value' => []
        ])

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
    @include('admin::ecommerce.variant.js', ['key' => 0])
@endsection