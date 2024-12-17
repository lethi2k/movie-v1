@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Lọc theo điều kiện</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Lọc theo điều kiện</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form
            action="{{route('admin.ecommerce.extension.module.update', ['type' => $type, 'module_id' => $module->module_id])}}"
            method="post" enctype="multipart/form-data" class="filter-validation">
            @csrf
            @include('admin::elements.form.action', ['pre' => route('admin.ecommerce.themes.edit', 1) ])
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin cơ bản</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="name">Tên module</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Tên module" value="{{$settings->name}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="title">Tiêu đề</label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Tiêu đề" value="{{$settings->title}}">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="productdesc">Mô tả chi tiết</label>
                                    <textarea class="form-control editor" id="productdesc" rows="5" name="description"
                                        placeholder="Mô tả">{!! $settings->description !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin khác</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <div class="row">
                                <div class="col-md-6 mb-3 ">
                                    <label for="">Chọn loại điều kiện</label>
                                    <select class="select2-search-disable choose_service" name="type">
                                        <option value="">Lựa chọn</option>
                                        <option value="product" {{$settings->type == 'product' ? 'selected' : ''}}>Sản
                                            phẩm</option>
                                        <option value="category_product" {{$settings->type == 'category_product' ?
                                            'selected' : ''}}>Danh mục sản phẩm</option>
                                        <option value="new" {{$settings->type == 'new' ? 'selected' : ''}}>Tin tức
                                        </option>
                                        <option value="category_new" {{$settings->type == 'category_new' ? 'selected' :
                                            ''}}>Danh mục tin tức</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 product hide">
                                    <label for="">Lấy sản phẩm theo</label>
                                    <select class="select2-search-disable choose_type_service_product"
                                        data-name="product[type]">
                                        @foreach ($extensions['products'] as $key => $extension)
                                        <option value="{{$key}}" {{isset($settings->product->type) &&
                                            $settings->product->type == $key ? 'selected' : ''}}>{{$extension}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 mb-3 category_product hide">
                                    <label for="">Hiển thị danh mục theo</label>
                                    <select class="select2-search-disable choose_type_service_category_product"
                                        data-name="category_product[type]">
                                        @foreach ($extensions['category_products'] as $key => $extension)
                                        <option value="{{$key}}" {{isset($settings->category_product->type) &&
                                            $settings->category_product->type == $key ? 'selected' : ''}}>{{$extension}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 new hide">
                                    <label for="">Lấy tin tức theo</label>
                                    <select class="select2-search-disable choose_type_service_new"
                                        data-name="new[type]">
                                        @foreach ($extensions['news'] as $key => $extension)
                                        <option value="{{$key}}" {{isset($settings->new->type) && $settings->new->type
                                            == $key ? 'selected' : ''}}>{{$extension}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 category_new hide">
                                    <label for="">Hiển thị danh mục theo</label>
                                    <select class="select2-search-disable choose_type_service_category_new"
                                        data-name="category_new[type]">
                                        @foreach ($extensions['category_news'] as $key => $extension)
                                        <option value="{{$key}}" {{isset($settings->category_new->type) &&
                                            $settings->category_new->type == $key ? 'selected' : ''}}>{{$extension}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- content here extension --}}
                            <div class="content-extension" style="display:none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Sắp xếp tin
                                                tức
                                                theo</label>
                                            <div class="col-md-8">
                                                <select class="select2-search-disable" name="sort_order">
                                                    <option value="date_added" {{$settings->sort_order == 'date_added' ?
                                                        'selected' : ''}}>Ngày thêm</option>
                                                    <option value="name" {{$settings->sort_order == 'name' ? 'selected'
                                                        : ''}}>Tên</option>
                                                    <option value="order_by" {{$settings->sort_order == 'order_by' ?
                                                        'selected' : ''}}>Thứ tự</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">Thứ
                                                tự</label>
                                            <div class="col-md-8">
                                                <select class="select2-search-disable" name="value_sort_order">
                                                    <option value="asc" {{$settings->value_sort_order == 'asc' ?
                                                        'selected' : ''}}>Tăng dần</option>
                                                    <option value="desc" {{$settings->value_sort_order == 'desc' ?
                                                        'selected' : ''}}>Giảm dần</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label for="">Chọn sản phẩm</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row content-here">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin chung</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <div class="row">
                                <label class="col-md-6">Trạng thái <i class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" name="status" value="1" type="checkbox"
                                            id="SwitchCheckSizelg" checked="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-6">Hiển thị trên di động<i class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg"
                                            checked="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-6">Sử dụng dữ liệu mẫu <i class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4">Khối Hiển thị <i class="bx bx-info-circle"></i></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="sample_interface" value="{{isset($settings->sample_interface) ? $settings->sample_interface : ''}}">
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label class="col-md-6">Hình ảnh</label>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <a href="" id="thumb-image" data-toggle="image">
                                            <img width="200" src="{{$settings->image}}" class="input-image-overview"
                                                data-placeholder="{{$settings->image}}">
                                        </a>
                                        <input type="hidden" name="image" value="{{$settings->image}}" id="input-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input name="width" type="text" value="{{$settings->width}}"
                                                    class="form-control" placeholder="Chiều dài">
                                                <button type="button" class="btn btn-secondary" disabled="">
                                                    px
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input name="height" type="text" value="{{$settings->height}}"
                                                    class="form-control" placeholder="Chiều cao">
                                                <button type="button" class="btn btn-secondary" disabled="">
                                                    px
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-8">Giới hạn hiển thị</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" value="{{$settings->limit}}" name="limit">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>

    </div> <!-- container-fluid -->
</div>
</div>
</div>
@endsection

@section('js')
<script>
    $('.change-content').on('change', function () {
        var value = $(this).val();
        if (value == 'icons') {
            $('.content-icons').show();
            $('.content-images').hide();
        } else {
            $('.content-icons').hide();
            $('.content-images').show();
        }
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
    });

    $('.choose_service').on('change', function () {
        var value = $(this).val();
        eventService(value);
    });

    eventService($('.choose_service').find(":selected").val());
    function eventService(value) {
        var current_name = $('.' + value).find("select").attr('data-name');
        $('.choose_type_service_product').addClass('hide');
        $('.hide').find("select").removeAttr('name');
        $('.' + value).find("select").attr('name', current_name);
        $('.'+ value).removeClass('hide').show();
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
    }

    switch ($('.choose_service').find(":selected").val()) {
        case 'product':
            var curent_value = {!! json_encode($curent_product_category) !!};
            eventAjaxProduct($('.choose_type_service_product').find(":selected").val(), curent_value);
        break;
        case 'category_product':
            var curent_value = {!! json_encode($curent_category) !!};
            eventAjaxCategory($('.choose_type_service_category_product').find(":selected").val(), curent_value);
        break;
        case 'new':
            var curent_value = {!! json_encode($curent_new_category) !!};
            eventAjaxNew($('.choose_type_service_new').find(":selected").val(), curent_value);
        break;
        case 'category_new':
            var curent_value = {!! json_encode($curent_category_new) !!};
            eventAjaxCategoryNew($('.choose_type_service_category_new').find(":selected").val(), curent_value);
        break;
    }

    function eventAjaxProduct(value){
        if(value == 'custom'){
            $.ajax({
                url: "{{route('admin.product.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.product_id), curent_value) > -1 ? 'checked' : '';
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="product[value][]" value="'+item.product_id+'" id="product-'+item.product_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="product-'+item.product_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }

        if(value == 'category'){
            
            $.ajax({
                url: "{{route('admin.category.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.category_id), curent_value) > -1 ? 'checked' : '';  
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="product[category][]" value="'+item.category_id+'" id="category-product-'+item.category_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="category-product-'+item.category_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }
    }

    function eventAjaxCategory(value){
        if(value == 'custom'){
            $.ajax({
                url: "{{route('admin.category.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.category_id), curent_value) > -1 ? 'checked' : '';
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="category_product[value][]" value="'+item.category_id+'" id="category-product-'+item.category_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="category-product-'+item.category_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }
    }

    function eventAjaxNew(value){
        if(value == 'custom'){
            $.ajax({
                url: "{{route('admin.post.blog.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.news_id), curent_value) > -1 ? 'checked' : '';
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="new[value][]" value="'+item.news_id +'" id="new-'+item.news_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="new-'+item.news_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }

        if(value == 'category'){
            $.ajax({
                url: "{{route('admin.post.category.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.category_id), curent_value) > -1 ? 'checked' : '';
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="new[category][]" value="'+item.category_id+'" id="category-new-'+item.category_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="category-new-'+item.category_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }
    }

    function eventAjaxCategoryNew(value){
        if(value == 'custom'){
            $.ajax({
                url: "{{route('admin.post.category.ajax.list')}}",
                type: 'GET',
                success: function (json) {
                    var html = '';
                    json.data.forEach(function(item) {
                        var checked = $.inArray(String(item.category_id), curent_value) > -1 ? 'checked' : '';
                        html += '<div class="form-check form-check-primary mb-3 col-md-6">';
                        html += '<input class="form-check-input" type="checkbox" name="category_new[value][]" value="'+item.category_id+'"  id="category-new-'+item.category_id+'" '+checked+'>';
                        html += '<label class="form-check-label" for="category-new-'+item.category_id+'">'+item.description.name+'</label>';
                        html += '</div>';
                    });

                    $('.content-extension .content-here').html(html);
                    $('.content-extension').show();
                }
            });
        }
    }

    $('.choose_type_service_product').on('change', function () {
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
        eventAjaxProduct($(this).val(), []);
    });

    $('.choose_type_service_category_product').on('change', function () {
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
        eventAjaxCategory($(this).val(), []);
    });

    $('.choose_type_service_new').on('change', function () {
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
        eventAjaxNew($(this).val(), []);
        
    });

    $('.choose_type_service_category_new').on('change', function () {
        $('.content-extension .content-here').html('');
        $('.content-extension').hide();
        eventAjaxCategoryNew($(this).val(), []);
    });

    //validate form
    $('.filter-validation').validate({
        lang: 'vi',
        rules: {
            'name': {
                required: true,
                minlength: 2,
            },
            'title': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>
@endsection