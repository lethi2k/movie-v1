@extends('admin::layouts.index')
@section('style')
    <link href="{{asset('admin/assets/libs/bootstrap-editable/css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cấu hình hệ thống</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Cài đặt cửa hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin::elements.form.action', ['pre' => URL::asset('admin/warehouse/list/all')])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cấu hình hệ thống</h4>
                        <p class="card-title-desc">Cài đặt tài khoản với hệ thống</p>


                        <ul class="nav nav-tabs nav-tabs-custom my-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#configuration" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Cấu hình tổng quan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#default_parameter" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tham số mặc định</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#server" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Máy chủ</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#email" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Email</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#social_network" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Mạng xã hội</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content p-3 text-muted">

                            <div class="tab-pane active" id="configuration" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">QUẢN LÝ HIỂN THỊ</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="newsletter">Hiển thị số sản phẩm trên Danh mục</label>
                                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizelg" checked="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Giới hạn số sản phẩm hiển thị trang quản
                                                        trị</label>
                                                    <input type="number" name="category[sort_order]" value="0"
                                                        class="form-control" id="sort" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">ĐÁNH GIÁ</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Khánh hàng đánh giá</label>
                                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizelg" checked="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Duyệt đánh giá</label>
                                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizelg" checked="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Khách vãng lai đánh giá :</label>
                                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizelg" checked="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">PHIẾU QUÀ TẶNG</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Giá trị tối thiểu</label>
                                                <input type="number" name="category[sort_order]" value="0"
                                                    class="form-control" id="sort" placeholder="">
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Giá trị tối đa</label>
                                                <input type="number" name="category[sort_order]" value="0"
                                                    class="form-control" id="sort" placeholder="">
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Sử dụng phiếu quà tặng</label>
                                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">MÃ GIẢM GIÁ</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <label for="newsletter">Sử dụng Mã giảm giá</label>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg"
                                                    checked="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">THIẾT LẬP THUẾ</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Hiển thị Giá và Thuế</label>
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="SwitchCheckSizelg" checked="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Sử dụng địa chỉ Cửa hàng để tính
                                                        thuế</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="d-block">Sử dụng địa chỉ Khách hàng để tính Thuế
                                                        :</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">QUẢN LÝ KHÁCH HÀNG</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Hiển thị khách hàng đang truy cập</label>
                                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Hoạt động của Khách hàng</label>
                                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Lưu lịch sử tìm kiếm</label>
                                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Hiện giá khi đăng nhập</label>
                                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Thiết lập Nhóm khách hàng</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Nhóm Khách hàng</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Số lần Đăng nhập tối đa</label>
                                                <input type="number" name="category[sort_order]" value="0"
                                                    class="form-control" id="sort" placeholder="">
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Quy định khách hàng</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">QUẢN LÝ THANH TOÁN</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Trọng lượng giỏ hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Đăng nhập khi thanh toán</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Khách thanh toán</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Thanh toán định kỳ</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Tiền tố cho Hóa đơn hàng</label>
                                                <input type="number" name="category[sort_order]" value="0"
                                                    class="form-control" id="sort" placeholder="">
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Quy định thanh toán</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>


                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Trạng thái Đơn hàng</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Trạng thái đơn hàng đang xử lý</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Thiết lập trạng thái Đơn hàng đã Thanh
                                                    toán</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Tình trạng đặt hàng gian lận</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">API User</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">KHO HÀNG</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Hiển thị số lượng Sản phẩm</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Cảnh báo hết hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Hết hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">CỘNG TÁC VIÊN</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Tính năng Cộng tác viên</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Yêu cầu Rút tiền</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Xác nhận Tài khoản</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Tự động cập nhật Hoa hồng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Tỉ lệ Hoa Hồng (%)</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Quy định điều khoản</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">ĐỔI / TRẢ HÀNG</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Cho phép Đổi / Trả hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Quy định</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Trạng thái yêu cầu</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">BÁO CÁO</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label for="newsletter">Báo cáo Bán hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <label for="newsletter">Báo cáo Sản phẩm</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <label for="newsletter">Báo cáo Khách hàng</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <label for="newsletter">Báo cáo Marketing</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">MÃ XÁC NHẬN</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Mã xác nhận</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Trang áp dụng</label>
                                                <select class="form-select" id="newsletter" name="customer[newsletter]">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                            </div>

                            <div class="tab-pane" id="email" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">CẤU HÌNH</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="newsletter">Mail Protocol</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">EMAIL THÔNG BÁO</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Áp dụng thông báo</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="mb-3">
                                                    <label for="newsletter">Mail thông báo kèm</label>
                                                    <textarea class="form-control" name="customer[note]" id="note"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="server" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">CẤU HÌNH</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Chế độ bảo trì</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Chế độ URL thân thiện</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Cho phép chỉnh sửa URL thân thiện</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Đang phát triển</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Sticky Menu</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Giao diện AMP</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Chế độ nén ảnh</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Chế độ Lazyload</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="newsletter">Chặn copy dữ liệu</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="form-label">Gợi ý tìm
                                                    kiếm</label>
                                                <div class="col-md-6">
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-text-input" class="form-label">Tự động tạo mục lục
                                                    cho từ nội dung</label>
                                                <div class="col-md-4">
                                                    <label for="example-text-input mb-1" class="form-label"></label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="example-text-input" class="form-label">Vị trí mục lục
                                                        nội dung</label>
                                                    <input type="text" class="form-control">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="example-text-input" class="form-label">Thẻ mục
                                                        lục</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label>Cấu trúc dữ liệu Schema</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-text-input" class="form-label">Đăng ký Bộ công
                                                    thương</label>

                                                <div class="col-md-4">
                                                    <label for="example-text-input mb-1" class="form-label"></label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-text-input mb-1" class="form-label">Nội
                                                        dung</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-text-input mb-1" class="form-label">Đường
                                                        dẫn</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label>Autosave</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label>Robots</label>
                                                    <select class="form-select" id="newsletter"
                                                        name="customer[newsletter]">
                                                        <option value="1">Có</option>
                                                        <option value="0">Không</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label>Nén Website</label>
                                                    <input class="form-control" type="text" value="Artisanal kale"
                                                        id="example-text-input">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">BẢO MẬT</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Sử dụng SSL</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Bật chế độ lấy lại mật khẩu cho Admin</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Sử dụng chế độ Shared</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="newsletter">Khóa mã hóa</label>
                                                <textarea class="form-control" name="category_description[description]"
                                                    id="description" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">TẢI LÊN</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Kích thước File tối đa</label>
                                                <input class="form-control" type="text" id="example-text-input">
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Định dạng tệp tin được phép</label>
                                                <textarea class="form-control" name="category_description[description]"
                                                    id="description" rows="5"></textarea>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Định dạng Tệp tin cho phép trên Cửa hàng</label>
                                                <textarea class="form-control" name="category_description[description]"
                                                    id="description" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        <h4 class="card-title">XỬ LÝ LỖI</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Cho phép hiển thị báo lỗi</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <label for="newsletter">Lưu Lịch sử lỗi</label>
                                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="SwitchCheckSizelg" checked="">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="social_network" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-facebook-tab"
                                                data-bs-toggle="pill" href="#v-pills-facebook" role="tab"
                                                aria-controls="v-pills-facebook" aria-selected="false">Facebook</a>
                                            <a class="nav-link mb-2" id="v-pills-google-tab" data-bs-toggle="pill"
                                                href="#v-pills-google" role="tab" aria-controls="v-pills-google"
                                                aria-selected="false">Google</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-facebook" role="tabpanel"
                                                aria-labelledby="v-pills-facebook-tab">
                                                <div class="row">
                                                    <h4 class="card-title mb-3">FANPAGE</h4>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Facebook</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <h4 class="card-title mb-3">FACEBOOK PIXEL</h4>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Facebook App ID</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Facebook Admins</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Facebook App Version</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Facebook Pixel ID</label>
                                                            <textarea class="form-control"
                                                                name="category_description[description]"
                                                                id="description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="v-pills-google" role="tabpanel"
                                                aria-labelledby="v-pills-google-tab">
                                                <div class="row">
                                                    <h4 class="card-title mb-3">GOOGLE MAP</h4>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Mã Địa lý</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Mã Google API</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Mã nhúng Google Map</label>
                                                            <textarea class="form-control"
                                                                name="category_description[description]"
                                                                id="description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <h4 class="card-title mb-3">GOOGLE ANALYTIC</h4>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Mã Google Analytics</label>
                                                            <textarea class="form-control"
                                                                name="category_description[description]"
                                                                id="description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Mã Google Analytics</label>
                                                            <select class="form-select" id="newsletter"
                                                                name="customer[newsletter]">
                                                                <option value="1">Có</option>
                                                                <option value="0">Không</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <h4 class="card-title mb-3">GOOGLE REMARKETING</h4>
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Google Remaketing Code</label>
                                                            <textarea class="form-control"
                                                                name="category_description[description]"
                                                                id="description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <h4 class="card-title mb-3">GOOGLE CAPTCHA</h4>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Site key</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Secret key</label>
                                                            <input id="productname" name="productname" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="newsletter">Trạng thái</label>
                                                            <select class="form-select" id="newsletter"
                                                                name="customer[newsletter]">
                                                                <option value="1">Có</option>
                                                                <option value="0">Không</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="default_parameter" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="card-title">Toàn trang</h4>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="ProductName" class="form-label me-3">Ngôn ngữ (language_id)</label>
                                                <a href="javascript: void(0);" id="inline-username" data-type="text"
                                                    data-pk="1" data-title="Enter username"
                                                    class="editable editable-click">superuser</a>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ProductName" class="form-label me-3">Số thứ tự (sort_order)</label>
                                                <a href="javascript: void(0);" id="inline-username" data-type="text"
                                                    data-pk="1" data-title="Enter username"
                                                    class="editable editable-click">superuser</a>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ProductName" class="form-label me-3">Phân trang (paginate)</label>
                                                <a href="javascript: void(0);" id="inline-username" data-type="text"
                                                    data-pk="1" data-title="Enter username"
                                                    class="editable editable-click">superuser</a>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ProductName" class="form-label me-3">Bản ghi hiển thị (limit)</label>
                                                <a href="javascript: void(0);" id="inline-username" data-type="text"
                                                    data-pk="1" data-title="Enter username"
                                                    class="editable editable-click">superuser</a>
                                            </div>
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

    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
<script src="{{asset('admin/assets/libs/bootstrap-editable/js/index.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/form-xeditable.init.js')}}"></script>     
@endsection