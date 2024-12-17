@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sửa sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sửa sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.variant.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\VariantController@update', ['id' => $option->option_id]),
            'name' => $option->description->name,
            'type' => $option->type,
            'option_value' => $option->values
        ])

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
    @include('admin::ecommerce.variant.js', ['key' => count($option->values)])
@endsection