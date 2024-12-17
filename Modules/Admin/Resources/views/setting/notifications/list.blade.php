@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cấu hình thông báo</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Cấu hình thông báo</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Nội dung email</h4>
                <p class="card-title-desc mb-3">Những email này được gửi tự động tới bạn hoặc khách hàng. Click vào tên
                    mẫu email để chỉnh sửa.</p>
                <button type="button" class="btn btn-outline-secondary waves-effect">Tùy chỉnh mẫu email</button>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Đơn hàng</h4>
                        <hr>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Hoàn tất đơn hàng</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Gửi đến những khách hàng đang đặt hàng
                                nhưng chưa hoàn thành việc tạo đơn hàng</p>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Thông báo thanh toán đơn hàng thành công</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi khi đơn hàng chuyển trạng thái
                                thanh toán</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Thông báo khi hủy đơn hàng trong trang quản trị</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi khi quản trị hủy đơn hàng</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Xác nhận đơn hàng</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi khi khách hàng tạo đơn hàng</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Thông báo khi đơn hàng mới</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi đến những người đã đăng ký khi
                                có đơn hàng mới</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Xác nhận hoàn trả</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi sau khi thực hiện hoàn trả cho
                                khách hàng</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Đặt lại đơn hàng</a>
                            <p class="col-md-6 card-title-desc text-muted mb-1">Được gửi khi quản trị thực hiện đặt lại
                                đơn hàng</p>
                            <div class="col-md-2 form-check form-switch form-switch-md mb-3" dir="ltr">
                                <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Vận chuyển</h4>
                        <hr>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Xác nhận giao vận</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Được gửi khi đơn hàng được giao vận</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Khách hàng</h4>
                        <hr>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Kích hoạt tài khoản của khách hàng từ phía admin</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Được gửi khi tài khoản của khách hàng
                                được kích hoạt từ phía admin</p>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Đổi mật khẩu khách hàng</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Được gửi khi khách hàng yêu cầu đổi mật
                                khẩu</p>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Đăng ký tài khoản khách hàng thành công</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Được gửi đến khách hàng sau khi đăng ký
                                tài khoản thành công trên website</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Nội dung in đơn hàng</h4>
                <p class="card-title-desc mb-3">Mẫu nội dung có trong đơn hàng được in ra.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">In đơn hàng</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Mẫu nội dung khi in đơn hàng</p>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">In vận đơn</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Mẫu nội dung khi in vận đơn</p>
                        </div>
                        <div class="mb-3 row">
                            <a href="" class="col-md-4">Phiếu bàn giao vận đơn</a>
                            <p class="col-md-8 card-title-desc text-muted mb-1">Mẫu nội dung phiếu bàn giao vận đơn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Thông báo về đơn hàng</h4>
                <p class="card-title-desc mb-3">Nhận thông báo về đơn hàng qua email hoặc điện thoại.</p>
                <button type="button" class="btn btn-outline-secondary waves-effect">Thêm thông báo đơn hàng</button>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc mb-0 text-center">Chưa có email nào nhận thông báo về đơn hàng.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông báo trên Chrome</h4>
                        <p class="card-title-desc mb-3">Thiết lập này cho phép trình duyệt Chrome gửi thông báo khi có
                            đơn hàng mới. Bạn phải cho phép trình duyệt nhận thông báo từ Z-Web.</p>
                        <hr>
                        <button type="button" class="btn btn-success waves-effect waves-light">Bật nhận thông
                            báo</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Thông báo bình luận mới</h4>
                <p class="card-title-desc mb-3">Nhận thông báo qua email khi có bình luận mới.</p>
            </div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2">
                            <label class="form-check-label" for="formCheck2">
                                Bật chế độ gửi thông báo
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection