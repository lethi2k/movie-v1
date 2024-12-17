@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tùy chọn</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Tùy chọn</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Tiêu đề và mô tả</h4>
                <p class="card-title-desc">Tiêu đề và mô tả xác định cách thức hiển thị của cửa hàng trên các công cụ tìm kiếm.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên website</label>
                            <input id="name" name="name" value="" type="text"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tiêu đề trang chủ</label>
                            <input id="name" name="name" value="" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mô tả trang chủ</label>
                            <textarea required="" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Mã theo dõi Google</h4>
                <p class="card-title-desc">Nhập mã Google Analytics và Google Tag Manager để bạn có thể theo dõi các thống kê về truy cập của website. Lưu ý: Mã Google Tag Manager chỉ gắn trên trang thanh toán của bạn</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mã Google Analytics</label>
                            <textarea required="" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mã Google Tag Manager</label>
                            <input id="name" name="name" value="" type="text" class="form-control">
                            <p class="card-title-desc mt-1">Tiêu đề và mô tả xác định cách thức hiển thị của cửa hàng trên các công cụ tìm kiếm.</p>
                        </div>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2">
                            <label class="form-check-label" for="formCheck2">Sử dụng Enhanced Ecommmerce</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Facebook Pixel</h4>
                <p class="card-title-desc">Facebook Pixel giúp bạn tạo chiến dịch quảng cáo để tìm khách hàng mới. Bạn có thể kích hoạt tối đa 5 mã Pixel ID, sau mỗi mã Pixel ID vui lòng ấn "Enter".</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <input id="name" name="name" value="" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">API Chuyển đổi</h4>
                <p class="card-title-desc">Để kích hoạt API chuyển đổi với Pixel ID bạn đã cài đặt trên website, sau khi điền các thông tin, vui lòng chọn “Kích hoạt”.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc">Kích hoạt API Chuyển đổi</p>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Kích hoạt với tài khoản quảng cáo</label>
                            <p class="card-title-desc mt-1">Mọi thao tác thực hiện trên trang cấu hình. Mã kiểm tra là không bắt buộc</p>
                            <div class="mb-3">
                                <label for="name" class="form-label">Mã kiểm tra</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                                <p class="card-title-desc mt-1">*Lưu ý: mã kiểm tra sẽ hết hạn trong 24h từ lúc tạo</p>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Kích hoạt không có tài khoản quảng cáo</label>
                            <p class="card-title-desc mt-1">Bạn vui lòng điền thông tin access token và Pixel ID để kích hoạt. Mã kiểm tra là không bắt buộc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Trạng thái Website</h4>
                <p class="card-title-desc">Khi bật chế độ hiển thị nâng cấp, khách hàng sẽ thấy website của bạn đang ở trạng thái bảo trì. Nhập mật khẩu để truy cập được vào website.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc">Bạn đang sử dụng gói OMNI_TRIAL Sapo Web, để truy cập website vui lòng nhập mật khẩu <b>waa5sk</b>. Vui lòng <a href="">nâng cấp tài khoản</a> để gỡ bỏ mật khẩu website.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Đăng nhập nhanh với Google</h4>
                <p class="card-title-desc">Hiển thị popup đăng nhập nhanh qua gmail trên tất cả các trang của Website. “Đăng nhập nhanh với Google” sẽ không hoạt động khi website thiết lập vô hiệu hóa chức năng tài khoản <a href="">tại đây</a></p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2">
                            <label class="form-check-label" for="formCheck2">Bật chế độ đăng nhập nhanh trên Google</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection