<form action="{{$action}}" method="post">
    @csrf
    @include('admin::elements.form.action', ['pre' => URL::asset('admin/store/list') ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin tổng quan</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Tên cửa hàng</label>
                                <input id="name" name="store_description[name]" type="text" class="form-control" value="{{$name}}" placeholder="Nhập vào bắt buộc">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturername">Chủ cửa hàng</label>
                                <select class="form-control select2" name="store[user_id]">
                                    <option value="0">Lựa chọn</option>
                                    <option value="1">Lê Thi</option>
                                    <option value="2">owner</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fax">Fax</label>
                                <input id="fax" name="store[fax]" type="text" class="form-control" value="{{$fax}}" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label" for="email">Email</label>
                                <input id="email" name="store[email]" type="email" value="{{$email}}" class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>
                            <div class="mb-3">
                                <label class="control-label" for="telephone">Điện thoại</label>
                                <input id="telephone" name="store[telephone]" type="number" value="{{$telephone}}" class="form-control" placeholder="Nhập vào bắt buộc">
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="url">Đường dẫn đến cửa hàng</label>
                                <input id="url" name="store[url]" type="text" value="{{$url}}" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin mô tả</h4>
                    <p class="card-title-desc mb-0">Fill all information below</p>

                    <ul class="nav nav-tabs nav-tabs-custom my-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#infor" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Thông tin cơ bản</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#website" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Website</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="infor" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-4 mb-3 text-center">
                                    <a href="javascript:void(0)" id="thumb-image" data-toggle="image" class="img-thumbnail-primary img-thumbnail">
                                        <img width="200" src="{{$logo}}" class="input-image-overview" data-placeholder="{{$logo}}">
                                    </a>
                                    <input type="hidden" name="store[logo]" id="input-image" value="{{$logo}}">
                                </div>

                                <div class="col-sm-8">
                                    <div class="mb-3">
                                        <label for="operating_time">Giờ mở cửa</label>
                                        <textarea class="form-control" id="operating_time" name="store_description[operating_time]" rows="3">{!! $operating_time !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment">Chú ý</label>
                                        <textarea class="form-control" name="store_description[comment]" id="comment" rows="3">{!! $comment !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="url_map">Đường dẫn trên bản đồ</label>
                                        <textarea class="form-control" name="store_description[url_map]" id="url_map" rows="3">{!! $url_map !!}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="productname" for="introduction">Giới thiệu Cửa hàng</label>
                                        <textarea class="form-control editor" id="introduction" name="store_description[introduction]" rows="3">{!! $introduction !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="website" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="metaTitle" class="form-label">Tiêu đề (Thẻ title)</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-date">
                                            <img src="http://127.0.0.1:8000/admin/assets/images/flags/vietnam.png" alt="" class="rounded avatar-seo">
                                        </span>
                                        <input type="text" name="store_description[meta_title]" value="{{$meta_title}}" class="form-control" id="metaTitle">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="meta_description" class="form-label">Thẻ Mô tả (Meta description)</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="option-date">
                                            <img src="http://127.0.0.1:8000/admin/assets/images/flags/vietnam.png" alt="" class="rounded avatar-seo">
                                        </span>
                                        <input type="text" name="store_description[meta_description]" value="{{$meta_description}}" class="form-control" id="meta_description">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="code_header" class="form-label">Mã nhúng thẻ Head</label>
                                    <textarea class="form-control" rows="5" name="store_description[code_header]" id="code_header">{{$code_header}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="code_footer" class="form-label">Mã nhúng Body</label>
                                    <textarea class="form-control" rows="5" name="store_description[code_footer]" id="code_footer">{{$code_footer}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- address -->
            <input type="hidden" name="address[id]" value="{{$address_id}}">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Khu vực</h4>
                    <p class="card-title-desc">Thông tin giao hàng khi đặt hàng từ các kênh bán hàng</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="address">Địa chỉ chi tiết (số nhà, ngõ/hẻm ...)</label>
                                <input id="address" name="address[address]" type="text" class="form-control" value="{{$address}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Quốc gia</label>
                                <select class="form-control" name="address[country_id]" id="country_id">
                                    <option value="230" selected>Việt Nam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label" for="district_id">Quận huyện</label>
                                <select class="form-control select2" name="address[district_id]" id="district_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="province_id">Tỉnh, thành phố</label>
                                <select class="form-control select2" name="address[province_id]" id="province_id">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="commune_id">Xã phường</label>
                                <select class="form-control select2" name="address[commune_id]" id="commune_id">
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="language_id">Ngôn ngữ mặc định</label>
                                <select class="form-control select2" name="setting[language_id]" id="language_id">
                                    <option value="vi-vn" selected="selected">Vietnam</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="admin_language_id">Ngôn ngữ trang Quản lý</label>
                                <select class="form-control select2" name="setting[admin_language_id]" id="admin_language_id">
                                    <option value="vi-vn" selected="selected">Vietnam</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="length_class_id">Đơn vị Chiều dài</label>
                                <select class="form-control select2" name="setting[length_class_id]" id="length_class_id">
                                    <option value="1" selected="selected">Centimeter</option>
                                    <option value="2">Millimeter</option>
                                    <option value="3">Inch</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="currency">Tiền tệ</label>
                                <select name="setting[currency]" id="input-currency" class="form-control">
                                    <option value="EUR">Euro</option>
                                    <option value="GBP">Pound Sterling</option>
                                    <option value="USD">US Dollar</option>
                                    <option value="VND" selected="selected">VND</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="currency_auto">Tự động cập nhật Tỉ giá</label>
                                <div class="my-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input warehouse_status" type="radio" name="setting[currency_auto]" id="currency_auto_1" value="1" checked="checked">
                                        <label class="form-check-label" for="currency_auto_1">Quản lý số lượng</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input warehouse_status" type="radio" name="setting[currency_auto]" id="currency_auto_0" value="0">
                                        <label class="form-check-label" for="currency_auto_0">Không quản lý</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="input-weight-class">Đơn vị Trọng lượng</label>
                                <select name="setting[weight_class_id]" id="input-weight-class" class="form-control select2">
                                    <option value="1" selected="selected">Kilogram</option>
                                    <option value="2">Gram</option>
                                    <option value="5">Pound </option>
                                    <option value="6">Ounce</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>