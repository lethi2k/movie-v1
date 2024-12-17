<form method="post" action="{{$action}}" enctype="multipart/form-data" class="pages-validation">
    @csrf
    @include('admin::elements.form.action', ['pre' => route('admin.pages.list'), isset($model) ? $model : ''
    ])

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#infor" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Thông tin cơ bản</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#website" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Tùy chỉnh SEO</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="infor" role="tabpanel">
                            <h4 class="card-title">Nội dung chính</h4>
                            <p class="card-title-desc">Fill all information below</p>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="name">Tiêu đề</label>
                                    <input id="name" name="information_description[title]" type="text" class="form-control"
                                        placeholder="Nhập vào bắt buộc" value="{{$title}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="productdesc">Nội dung</label>
                                    <textarea class="form-control editor2" id="description"
                                        name="information_description[description]" rows="5"
                                        placeholder="">{!! $description !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="website" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="metaTitle" class="form-label">Thẻ tiêu đề (Meta title)</label>
                                    <input type="text" name="information_description[meta_title]" value="{{$meta_title}}"
                                        class="form-control" id="metaTitle" placeholder="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="metaDesc" class="form-label">Thẻ mô tả (Meta desc)</label>
                                    <textarea class="form-control" rows="5" placeholder="Product Description"
                                        name="information_description[meta_description]"
                                        id="meta_description">{!! $meta_description !!}</textarea>
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
                    <p class="card-title-desc mb-3">Fill all information below</p>
                    <div class="mb-0 row">
                        <label for="example-text-input" class="col-md-8 col-form-label">Trạng thái</label>
                        <div class="col-md-4 float-end">
                            <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" name="information[status]" value="{{$status}}"
                                    id="SwitchCheckSizelg" checked="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Khung giao diện</h4>
                    <select id="" class="select2-search-disable">
                        <option value="">Giao diện 1</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-start">
                        <h4 class="card-title mb-3">Gắn lên Menu</h4>
                    </div>
                    <div class="float-end">
                        <a href="http://127.0.0.1:8000/admin/manufacturer/list" target="_blank" class="link-primary">
                            <i class="bx bx-check-double"></i> Chọn Menu
                        </a>
                    </div>
                    
                    <div class="content-menu" style="clear: both">
                        <p>Thêm Trang nội dung vào Menu</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="card-title">SEO</label>
                        <p class="text-muted mb-1 text-truncate">Xem trước kết quả tìm kiếm:</p>
                        <div class="content-seo">
                            <h4 class="card-title google-title">{{$google_title}}</h4>
                            <p class="teaser google-url">
                                http://default.exdomain.net/ao-thun-tay-lo-nam-nu-form-rong-chu-kieu-ca-tinh
                            </p>
                            <p class="teaser google-description">{{$google_description}}</p>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="formCheck1" checked>
                        <label class="form-check-label" for="formCheck1">
                            Chỉnh sửa Url
                        </label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="option-router">
                            <img src="{{URL::asset('admin/assets/images/flags/vietnam.png')}}" alt=""
                                class="rounded avatar-seo">
                        </span>
                        <input type="text" class="form-control" name="router" value="ao-thun-tay-lo-nam-nu-form-rong-chu-kieu-ca-tinh">
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- end row -->