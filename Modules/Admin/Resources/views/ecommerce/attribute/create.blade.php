@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm nhóm thuộc tính</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Thương mại điện tử</li>
                            <li class="breadcrumb-item active">Thêm nhóm thuộc tính</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.attribute.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\AttributeController@store'),
            'name' => null,
            'sort_order' => 0,
            'type' => 'Radio',
            'attributes' => []
        ])
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.attribute.modal')
@endsection
@section('js')
    @include('admin::ecommerce.attribute.js', ['key' => 1])
@endsection