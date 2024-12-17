@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sửa bài viết</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sửa bài viết</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::post.blog.form',
        [
        'action' => action('Modules\Admin\Http\Controllers\Post\BlogController@update', ['id' => $blog->news_id]),
        'categories' => $categories,
        'category_ids' => $blog->categories->pluck('category_id')->toArray(),
        'sort_order' => $blog->sort_order,
        'image' => $blog->image,
        'name' => $blog->description->name,
        'status' => $blog->status,
        'description_short' => $blog->description->description_short,
        'description' => $blog->description->description,
        'meta_title' => $blog->description->meta_title,
        'tag' => $blog->description->tag,
        'meta_description' => $blog->description->meta_description,
        'google_title' => $blog->description->meta_title,
        'google_url' => 'Đường dẫn của danh mục trên Google',
        'google_description' => $blog->description->meta_description,
        'slug' => seo_url($blog->description->name)
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