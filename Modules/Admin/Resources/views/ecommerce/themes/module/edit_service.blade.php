@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thông tin dịch vụ</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thông tin dịch vụ</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end page title -->
        <form
            action="{{route('admin.ecommerce.extension.module.update', ['type' => $type, 'module_id' => $module->module_id])}}"
            method="post" enctype="multipart/form-data" class="service-validation">
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
                                    <input id="name" name="name" type="text" value="{{$module->name}}"
                                        class="form-control" placeholder="Tên module">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="title">Tiêu đề</label>
                                    <input id="title" name="title" value="{{$settings->title}}" type="text"
                                        class="form-control" placeholder="Tiêu đề">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="description">Mô tả chi tiết</label>
                                    <textarea class="form-control editor" id="description" rows="5" name="description"
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
                                <div class="col-md-3">
                                    @foreach ($settings->module_description as $key => $setting)
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link mb-2 {{$key == 0 ? 'active' : ''}}"
                                            id="content-slider-tab-{{$key}}" data-bs-toggle="pill"
                                            href="#content-slider-{{$key}}" role="tab"
                                            aria-controls="content-slider-{{$key}}" aria-selected="true">Content tab
                                            {{$key}}</a>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                        @foreach ($settings->module_description as $key => $setting)
                                        <div class="tab-pane fade {{$key == 0 ? 'active show' : ''}}"
                                            id="content-slider-{{$key}}" role="tabpanel"
                                            aria-labelledby="content-slider-tab-{{$key}}">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="title">Tiêu đề</label>
                                                    <input id="title" name="module_description[{{$key}}][title]"
                                                        type="text" class="form-control" placeholder="Manufacturer Name"
                                                        value="{{$setting->title}}">
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                    <label for="description">Mô tả chi tiết</label>
                                                    <textarea class="form-control" id="description" rows="5"
                                                        name="module_description[{{$key}}][description]"
                                                        placeholder="Product Description">{{ $setting->description }}</textarea>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input change-content" type="radio"
                                                            name="module_description[{{$key}}][status]"
                                                            id="content-icons" value="icons" {{ $setting->status ==
                                                        'icons' ? 'checked' :
                                                        ''}}>
                                                        <label class="form-check-label" for="content-icons">Icon</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input change-content" type="radio"
                                                            name="module_description[{{$key}}][status]"
                                                            id="content-images" value="image" {{ $setting->status ==
                                                        'image' ? 'checked' :
                                                        ''}}>
                                                        <label class="form-check-label" for="content-images">Ảnh</label>
                                                    </div>

                                                    <div class="content-icons mt-3" {!! $setting->status == 'image' ?
                                                        'style="display:none"' : '' !!}>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="insurance_origin">Tên icon</label>
                                                                <input id="insurance_origin"
                                                                    name="module_description[{{$key}}][icon]"
                                                                    type="text" class="form-control" placeholder=""
                                                                    value="{{$setting->icon}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="content-images mt-3" {!! $setting->status != 'image' ?
                                                        'style="display:none"' : '' !!}>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <a href="" id="thumb-image{{$key}}" data-toggle="image">
                                                                    <img width="200" src="{{$setting->image}}"
                                                                        class="input-image-overview"
                                                                        data-placeholder="{{$setting->image}}">
                                                                </a>
                                                                <input type="hidden"
                                                                    name="module_description[{{$key}}][image]"
                                                                    value="{{$setting->image}}"
                                                                    id="input-image{{$key}}">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-6">Chiều
                                                                        ngang ảnh <i
                                                                            class="bx bx-info-circle"></i></label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <input
                                                                                name="module_description[{{$key}}][width]"
                                                                                type="text" value="{{$setting->width}}"
                                                                                class="form-control"
                                                                                placeholder="Nhập vào">
                                                                            <button type="button"
                                                                                class="btn btn-secondary" disabled="">
                                                                                px
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-6">Chiều cao
                                                                        ảnh <i class="bx bx-info-circle"></i></label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <input
                                                                                name="module_description[{{$key}}][hight]"
                                                                                type="text" value="{{$setting->hight}}"
                                                                                class="form-control"
                                                                                placeholder="Nhập vào">
                                                                            <button type="button"
                                                                                class="btn btn-secondary" disabled="">
                                                                                px
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="insurance_origin">Nút bấm</label>
                                                    <input id="insurance_origin"
                                                        name="module_description[{{$key}}][button]" type="text"
                                                        class="form-control" value="{{$setting->button}}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="insurance_origin">Đường dẫn</label>
                                                    <input id="insurance_origin"
                                                        name="module_description[{{$key}}][link]" type="text"
                                                        class="form-control" value="{{$setting->link}}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addData('{{$type}}')"
                                    class="btn btn-outline-success mt-3 mt-lg-0">Thêm
                                    mới nội dung</button>
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
                                    <input class="form-control" type="text" name="sample_interface"
                                        value="{{isset($settings->sample_interface) ? $settings->sample_interface : ''}}">
                                </div>
                            </div>

                            <div class="mb-3">
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
                                                    class="form-control" placeholder="Nhập vào">
                                                <button type="button" class="btn btn-secondary" disabled="">
                                                    px
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input name="height" type="text" value="{{$settings->height}}"
                                                    class="form-control" placeholder="Nhập vào">
                                                <button type="button" class="btn btn-secondary" disabled="">
                                                    px
                                                </button>
                                            </div>
                                        </div>
                                    </div>

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
@endsection

@section('js')
<script>
    $('#v-pills-tab .nav-link').click(function () {
        var tab_active = $(this).attr('href');
        $('#v-pills-tab .nav-link').removeClass('active');
        $(this).addClass('active');
        $('#v-pills-tabContent .tab-pane').removeClass('active show');
        $(tab_active).addClass('active show');
    });

    $('.change-content').on('change', function () {
        var value = $(this).val();
        if (value == 'icons') {
            $('.content-icons').show();
            $('.content-images').hide();
        } else {
            $('.content-icons').hide();
            $('.content-images').show();
        }
    });

    //validate form
    $('.service-validation').validate({
        lang: 'vi',
        rules: {
            'name': {
                required: true,
                minlength: 2,
            },
            'title': {
                required: true,
                minlength: 2,
            },
            'module_description[0][title]': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>
@include('admin::ecommerce.themes.extension.js.common')
@endsection