@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới danh mục tin tức</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới danh mục tin tức</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        @include('admin::post.category.form',
        [
            'action' => action('Modules\Admin\Http\Controllers\Post\CategoryController@update', ['id' => $category->category_id]),
            'parents' => $parents,
            'parent_id' => $category->parent_id,
            'sort_order' => $category->sort_order,
            'image' => strlen($category->image) ? $category->image : 'images/default.png',
            'name' => $category->description->name,
            'status' => $category->status,
            'description' => $category->description->description,   
            'meta_title' => $category->description->meta_title,
            'seo_url' => seo_url($category->description->name),
            'meta_description' => $category->description->meta_description,
            'google_title' => $category->description->meta_title,
            'google_url' => $category->description->meta_keyword,
            'google_description' => $category->description->meta_description,
        ])

    </div>
    @endsection

    @section('js')
    <script>
        var data = {
            _totken: '{{ csrf_token() }}',
        };
    </script>

    @include(
    'admin::ecommerce.category.js',
    ['url' => URL::asset('admin/category/ajax'), 'data' => "<script>
        data
    </script>"]
    )
    @endsection