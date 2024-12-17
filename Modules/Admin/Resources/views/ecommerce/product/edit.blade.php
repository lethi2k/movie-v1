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
            'action' => action('Modules\Admin\Http\Controllers\Ecommerce\ProductController@update', ['id' => $product->product_id]),
            'product_name' => $product->description->name,
            'product_id' => $product->product_id,
            'attributes' => $product->attributes,
            'type_movie' => $product->type_movie,
            'options' => $product->options,
            'location' => $product->location,
            'product_year_manufacture' => $product->year_manufacture,
            'rate' => $product->rate,
            'url_trainner' => $product->url_trainner,
            'episode_duration' => $product->episode_duration,
            'product_warning' => $product->warning,
            'quantity' => $product->quantity,
            'image' => $product->image,
            'product_images' => $product->images,
            'product_model' => $product->model,
            'product_price' => number_format($product->price),
            'product_market_price' => number_format($product->market_price),
            'meta' => $product->description->description_short,
            'description' => $product->description->description,
            'manufacturer_id' => isset($product->manufacturer->manufacturer_id) ?? $product->manufacturer->manufacturer_id,
            'id_categores' => $product->categories->count() > 0 ? collect($product->categories)->map(function ($category){
                                return $category->category_id;
                            })->toArray() : [],
            'tags' => explode(',', $product->description->tag),
            'weight' => number_format($product->weight),
            'length' => number_format($product->length),
            'width' => number_format($product->width),
            'height' => number_format($product->height),
            'action_form' => 'edit',
            'meta_keyword' => $product->description->meta_keyword,
            'meta_title' => strlen($product->description->meta_title) ? $product->description->meta_title : 'Tiêu đề của bài viết trên Google',
            'meta_description' => strlen($product->description->meta_description) ? $product->description->meta_description : 'Mô tả của bài viết trên kết quả tìm kiếm trên Google',
        ]
        )

    </div> <!-- container-fluid -->
</div>

@include('admin::ecommerce.manufacturer.modal')
@include('admin::ecommerce.category.modal')
@endsection
@section('js')
    @include('admin::ecommerce.product.js.editor');
    @include('admin::ecommerce.product.js.variant');
    @include('admin::ecommerce.product.js.action');
@endsection