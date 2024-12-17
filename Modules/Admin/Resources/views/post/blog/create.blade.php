@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới bài viết</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới bài viết</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::post.blog.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Post\BlogController@store'),
        'categories' => $categories,
        'category_ids' => [],
        'sort_order' => 0,
        'image' => asset('images/default.png'),
        'name' => null,
        'status' => 1,
        'description_short' => null,
        'description' => null,
        'meta_title' => null,
        'tag' => null,
        'meta_description' => null,
        'google_title' => 'Tiêu đề của danh mục trên Google',
        'google_url' => 'Đường dẫn của danh mục trên Google',
        'google_description' => 'Mô tả của danh mục trên Google',
        'slug' => ''
        ])

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.product.js.editor');
<script>
    $("#name").change(function() {
        var seo_name = toSeoUrl($(this).val());

        //show google seo
        $('.google-title').text($(this).val());
        $('.google-url').text(seo_name);

        //add value input seo custom
        $('#metaTitle').val($(this).val());
        $('#seoUrl').val(seo_name);
    });
    
    $("#description").change(function() {
        var description = $(this).text();
        description = description.substring(0, 350);

        //show google seo
        $('.google-description').text(description);

        //add value input seo custom
        $('#meta_description').val(description);
    });
</script>

@endsection