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

        @include('admin::ecommerce.product.form', [
        'action' => action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@store'),
        'attributes' => [],
        'options' => [
            (object) [
                'product_option_id' => 1000,
                'value' => ''
            ]
        ],
        'type_movie' => 'one_episodes',
        'product_name' => null,
        'warehouse_sku' => null,
        'warehouse_barcode' => null,
        'location' => null,
        'rate' => null,
        'url_trainner' => null,
        'warehouse_status' => 1,
        'warehouse_id' => 0,
        'quantity' => 0,
        'image' => asset('images/default.png'),
        'product_images' => [],
        'product_year_manufacture' => null,
        'product_id' => 0,
        'product_model' => null,
        'episode_duration' => null,
        'meta' => null,
        'description' => null,
        'product_warning' => null,
        'manufacturer_id' => 0,
        'id_categores' => [],
        'id_variants' => [],
        'action_form' => 'add',
        'meta_keyword' => '',
        'meta_description' => 'Mô tả của bài viết trên kết quả tìm kiếm trên Google',
        'meta_title' => 'Tiêu đề của bài viết trên Google',
        ])

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.manufacturer.modal')
@include('admin::ecommerce.category.modal')
@endsection

@section('js')
@include('admin::ecommerce.product.js.editor')
@include('admin::ecommerce.product.js.variant')
@include('admin::ecommerce.product.js.action')
@endsection
