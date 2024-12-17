@extends('admin::layouts.index')
@section('content')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Trình chiếu ảnh Bxslider</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Trình chiếu ảnh Bxslider</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <!-- end page title -->
        <form
            action="{{route('admin.ecommerce.extension.module.update', ['type' => $type, 'module_id' => $module->module_id])}}"
            method="post" enctype="multipart/form-data" class="gallery-validation">
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
                                    <label for="name">Tên mô-đun</label>
                                    <input id="name" name="name" value="{{$module->name}}" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="manufacturername">Thời gian hiển thị một ảnh</label>
                                    <select class="form-control select2-search-disable" name="time">
                                        <option value="1">1 Giây</option>
                                        <option value="3">3 Giây</option>
                                        <option value="5">5 Giây</option>
                                        <option value="7">7 Giây</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-check-primary mb-3">
                                        <input class="form-check-input" type="checkbox" id="pagination"
                                            name="pagination">
                                        <label class="form-check-label" for="pagination">
                                            Hiện các chấm đại diện ảnh
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-primary mb-3">
                                        <input class="form-check-input" type="checkbox" name="navigation"
                                            id="navigation" value="1">
                                        <label class="form-check-label" for="navigation">
                                            Hiển thị nút chuyển ảnh
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="productdesc">Mô tả chi tiết</label>
                                    <textarea class="form-control editor" name="description" id="productdesc"
                                        rows="5">{!! $settings->description !!}</textarea>
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
                                    @foreach ($settings->image as $key => $setting)
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link mb-2 {{$key == 0 ? 'active' : ''}}"
                                            id="content-slider-tab-{{$key}}" data-bs-toggle="pill"
                                            href="#content-slider-{{$key}}" role="tab"
                                            aria-controls="content-slider-{{$key}}"
                                            aria-selected="true">{{$setting->title}}</a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                        @foreach ($settings->image as $key => $setting)

                                        <div class="tab-pane fade {{$key == 0 ? 'active show' : ''}}"
                                            id="content-slider-{{$key}}" role="tabpanel"
                                            aria-labelledby="content-slider-tab-{{$key}}">

                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <a href="" data-toggle="image" class="img-thumbnail">
                                                            <img width="200"
                                                                src="{{isset($setting->image) ? $setting->image : ''}}"
                                                                class="input-image-overview"
                                                                data-placeholder="{{isset($setting->image) ? $setting->image : ''}}">
                                                        </a>
                                                        <input type="hidden" name="image[{{$key}}][image]"
                                                            value="{{isset($setting->image) ? $setting->image : ''}}"
                                                            id="thumb-image{{$key}}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="title">Tiêu đề</label>
                                                            <input id="title" name="image[{{$key}}][title]"
                                                                value="{{$setting->title}}" type="text"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="link">Đường dẫn</label>
                                                            <input id="link" name="image[{{$key}}][link]" type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productdesc">Mô tả chi tiết</label>
                                                <textarea class="form-control" id="description" rows="5"
                                                    name="image[0][description]"></textarea>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addData()" style="width:100%"
                                    class="btn btn-outline-success mt-3 mt-lg-0">Thêm mới Slider</button>
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
                                <label class="col-md-6" for="input-status">Trạng thái <i
                                        class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="input-status" name="status"
                                            value="1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-6" for="som">Hiển thị trên di động<i
                                        class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="som" name="som" value="1"
                                            checked>
                                    </div>
                                </div>
                            </div>

                            <div class=" mb-3">
                                <div class="row mb-3">
                                    <label>Kích thước ảnh</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="width" name="width" type="text" value="{{ $settings->width }}"
                                                class="form-control" placeholder="Nhập vào">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                px
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="height" name="height" type="text" value="{{ $settings->height }}"
                                                class="form-control" placeholder="Nhập vào">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                px
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label>Kích thước ảnh mobile</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="width_mobile" name="width_mobile" type="text"
                                                value="{{ $settings->width_mobile }}" class="form-control"
                                                placeholder="Nhập vào">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                px
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="height_mobile" name="height_mobile" type="text"
                                                value="{{ $settings->height_mobile }}" class="form-control"
                                                placeholder="Nhập vào">
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
    
    var row = 1;
    function addData() {
        var tab = $('#content-slider-tab-0').clone();
        tab.attr('id', 'content-slider-tab-' + row);
        tab.attr('href', '#content-slider-' + row);
        tab.attr('aria-controls', 'content-slider-' + row);
        tab.removeClass('active');
        tab.text('Slider #' + row);
        var tabContent = $('#content-slider-0').clone();
        
        //rename name tag input
        tabContent.find('#title').attr('name', 'image[' + row + '][title]');
        tabContent.find('#link').attr('name', 'image[' + row + '][link]');
        tabContent.find('#description').attr('name', 'image[' + row + '][description]');
        tabContent.find('#thumb-image').attr('name', 'image[' + row + '][image]');

        //add placeholder for input
        tabContent.find('#title').attr('placeholder', 'Slider #' + row);
        tabContent.attr('id', 'content-slider-' + row);
        tabContent.attr('aria-labelledby', 'content-slider-tab-' + row);
        tabContent.removeClass('active show');

        $('#v-pills-tab').append(tab);
        $('#v-pills-tabContent').append(tabContent);

        row++;

        $('#v-pills-tab .nav-link').click(function () {
            var tab_active = $(this).attr('href');
            $('#v-pills-tabContent .tab-pane').removeClass('active show');
            $(tab_active).addClass('active show');
        });
    }

    //validate form
    $('.gallery-validation').validate({
        lang: 'vi',
        rules: {
            'name': {
                required: true,
                minlength: 2,
            },
            'image[0][title]': {
                required: true,
                minlength: 2,
            }
        }
    });
</script>
@endsection