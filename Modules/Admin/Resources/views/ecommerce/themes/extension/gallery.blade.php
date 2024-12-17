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

        <form action="{{ route('admin.ecommerce.extension.module.create', $type) }}" method="post"
            enctype="multipart/form-data" class="gallery-validation">
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
                                    <input id="name" name="name" type="text" class="form-control">
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
                                        rows="5"></textarea>
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
                                            aria-selected="true">Slider #0</a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                        <div class="tab-pane fade active show" id="content-slider-0" role="tabpanel"
                                            aria-labelledby="content-slider-tab-0">

                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <a href="" id="thumb-image0" data-toggle="image"
                                                            class="img-thumbnail-primary img-thumbnail">
                                                            <img width="200" src="{{asset('images/default.png')}}"
                                                                class="input-image-overview"
                                                                data-placeholder="{{asset('images/default.png')}}">
                                                        </a>
                                                        <input type="hidden" name="image[0][image]" value=""
                                                            id="input-image0">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="title">Tiêu đề</label>
                                                            <input id="title" name="image[0][title]" type="text"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="link">Đường dẫn</label>
                                                            <input id="link" name="image[0][link]" type="text"
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
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="addData('{{$type}}')" style="width:100%"
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
                                <label class="col-md-6" for="input-som">Hiển thị trên di động<i
                                        class="bx bx-info-circle"></i></label>
                                <div class="col-md-6 text-end">
                                    <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                        <input class="form-check-input" type="checkbox" id="input-som" name="som"
                                            value="1" checked>
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
                                <div class="row mb-3">
                                    <label>Kích thước ảnh</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="width" name="width" type="text" value="" class="form-control"
                                                placeholder="Chiều dài">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                px
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="height" name="height" type="text" value="" class="form-control"
                                                placeholder="Chiều cao">
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
                                            <input id="width_mobile" name="width_mobile" type="text" value=""
                                                class="form-control" placeholder="Chiều dài">
                                            <button type="button" class="btn btn-secondary" disabled="">
                                                px
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input id="height_mobile" name="height_mobile" type="text" value=""
                                                class="form-control" placeholder="Chiều cao">
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
@include('admin::ecommerce.themes.extension.js.common')
@endsection