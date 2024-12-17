@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Trang nội dung </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Trang nội dung </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::ecommerce.pages.form',
        [
        'action' => route('admin.pages.update', $page->information_id),
        'title' => $page->description->title,
        'status' => $page->status,
        'description_short' => $page->description->description_short,
        'description' => $page->description->description,
        'meta_title' => $page->description->meta_title,
        'tag' => $page->description->tag,
        'meta_description' => $page->description->meta_description,
        'google_title' => $page->description->meta_title,
        'google_url' => $page->description->meta_title,
        'google_description' => strlen($page->description->meta_description) ? $page->description->meta_description :'Mô tả của danh mục trên Google',
        ])

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
@include('admin::ecommerce.product.js.editor');
<script>
    $(document).ready(function() {
        //validate form
        $('.pages-validation').validate({
            lang: 'vi',
            rules: {
                'information_description[title]': {
                    required: true,
                    minlength: 2,
                }
            }
        });
    });

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