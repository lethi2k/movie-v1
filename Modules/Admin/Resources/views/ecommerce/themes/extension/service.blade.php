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
        <form action="{{ route('admin.ecommerce.extension.module.create', $type) }}" method="post"
            enctype="multipart/form-data" class="service-validation">
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
                                        placeholder="Tên module">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="title">Tiêu đề</label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Tiêu đề">
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="description">Mô tả chi tiết</label>
                                    <textarea class="form-control editor" id="description" rows="5" name="description"
                                        placeholder="Mô tả"></textarea>
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
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link mb-2 active" id="content-slider-tab-0" data-bs-toggle="pill"
                                            href="#content-slider-0" role="tab" aria-controls="content-slider-0"
                                            aria-selected="true">Tab content #0</a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                        <div class="tab-pane fade active show" id="content-slider-0" role="tabpanel"
                                            aria-labelledby="content-slider-tab-0">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="title">Tiêu đề</label>
                                                    <input id="title" name="module_description[0][title]" type="text"
                                                        class="form-control" placeholder="Tiêu đề tab">
                                                </div>

                                                <div class="col-sm-12 mb-3">
                                                    <label for="description">Mô tả chi tiết</label>
                                                    <textarea class="form-control" id="description" rows="5"
                                                        name="module_description[0][description]"
                                                        placeholder="Mô tả"></textarea>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input change-content" type="radio"
                                                            name="module_description[0][status]" id="content-icons"
                                                            value="icons" checked>
                                                        <label class="form-check-label" for="content-icons">Icon</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input change-content" type="radio"
                                                            name="module_description[0][status]" id="content-images"
                                                            value="image">
                                                        <label class="form-check-label" for="content-images">Ảnh</label>
                                                    </div>

                                                    <div class="content-icons mt-3">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="insurance_origin">Tên icon</label>
                                                                <input id="insurance_origin"
                                                                    name="module_description[0][icon]" type="text"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="content-images mt-3" style="display:none">
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <a href="" id="thumb-image0" data-toggle="image">
                                                                    <img width="200"
                                                                        src="{{asset('images/default.png')}}"
                                                                        class="input-image-overview"
                                                                        data-placeholder="{{asset('images/default.png')}}">
                                                                </a>
                                                                <input type="hidden" name="module_description[0][image]"
                                                                    value="{{asset('images/default.png')}}"
                                                                    id="input-image0">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-6">Chiều
                                                                        ngang ảnh <i
                                                                            class="bx bx-info-circle"></i></label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <input name="module_description[0][width]"
                                                                                type="text" value=""
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
                                                                            <input name="module_description[0][hight]"
                                                                                type="text" value=""
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
                                                    <input id="insurance_origin" name="module_description[0][button]"
                                                        type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="insurance_origin">Đường dẫn</label>
                                                    <input id="insurance_origin" name="module_description[0][link]"
                                                        type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
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
                                <label class="col-md-6" for="input-status">Trạng thái <i class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" name="status" value="1" type="checkbox"
                                            id="input-status" checked="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-6" for="input-som">Hiển thị trên di động<i class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="input-som" name="som"
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
                                    <input class="form-control" type="text" name="sample_interface" value="">
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label class="col-md-6">Hình ảnh</label>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <a href="" id="thumb-image" data-toggle="image">
                                            <img width="200" src="{{asset('images/default.png')}}"
                                                class="input-image-overview"
                                                data-placeholder="{{asset('images/default.png')}}">
                                        </a>
                                        <input type="hidden" name="image" value="{{asset('images/default.png')}}"
                                            id="input-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input name="width" type="text" value="" class="form-control"
                                                    placeholder="Chiều dài">
                                                <button type="button" class="btn btn-secondary" disabled="">
                                                    px
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <input name="height" type="text" value="" class="form-control"
                                                    placeholder="Chiều cao">
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