@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Phương thức thanh toán</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Phương thức thanh toán</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Thanh toán được chấp nhận</h4>
                <p class="card-title-desc">Các hình thức thanh toán khi mua hàng</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="https://bizweb.dktcdn.net/assets/admin/images/momo-v2.png" alt=""
                            class="rounded avatar-lg">
                        <p class="card-title-desc mt-3 mb-0">Cửa hàng của bạn chưa cấu hình thanh toán qua VNPAY-QR.</p>
                        <p class="card-title-desc mt-1">Để tìm hiểu cách thức kết nối và sử dụng vui lòng xem . <a
                                href="">Tại đây</a></p>
                        <hr>

                        <div class="open-form-momo" style="display: none">
                            <h4 class="card-title mb-3">CẤU HÌNH HIỂN THỊ</h4>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên phương thức</label>
                                <input id="name" name="name" value="Thanh toán qua Ví điện tử MoMo" type="text"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Hướng dẫn thanh toán <span>– Hiển thị ở trang thông
                                        báo
                                        mua hàng thành công và trang thanh toán.</span></label>
                                <textarea required="" class="form-control" rows="3"></textarea>
                            </div>
                            <h4 class="card-title mb-3">THÔNG TIN TÀI KHOẢN BUSINESS MOMO</h4>
                            <p class="card-title-desc mt-1">Bạn cần có tài khoản Business MoMo (M4B) để thực hiện tích
                                hợp
                                cổng thanh toán trên Website. Vui lòng truy cập <a href="">business.momo.vn</a> để đăng
                                ký
                                nếu bạn chưa có tài khoản.</p>

                            <div class="mb-3">
                                <label for="name" class="form-label">Số tài khoản MoMo</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên chủ tài khoản</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Số đăng ký kinh doanh</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Giấy đăng ký kinh doanh</label>
                                <input id="name" name="name" value="" type="file" class="form-control">
                            </div>
                            <hr>
                            <h4 class="card-title mb-3">THÔNG TIN TÍCH HỢP WEBSITE</h4>
                            <p class="card-title-desc mt-1">Để lấy các thông tin kết nối này, bạn cần đăng nhập vào tài
                                khoản Business MoMo. Sau đó truy cập <b>Tích hợp thanh toán ❯ Thông tin tích hợp
                                    Web.</b>
                            </p>
                            <div class="mb-3">
                                <label for="name" class="form-label">Partner Code</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Access Key</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Secret Key</label>
                                <input id="name" name="name" value="" type="text" class="form-control">
                            </div>

                            <div class="text-end mb-3">
                                <a href="javascript: void(0);" class="btn btn-outline-secondary px-3 mx-1 action-content" data-show="button-confirm" data-hide="open-form-momo">Huỷ</a>
                                <a href="javascript: void(0);" class="btn btn-success px-3">Lưu</a>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="javascript: void(0);" class="btn btn-primary action-content button-confirm" data-show="open-form-momo" data-hide="button-confirm">Thiết lập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý vai trò và phân quyền</h4>
                <p class="card-title-desc">Hỗ trợ thêm mới, phân quyền và quản lý sửa xóa các vai trò của cửa hàng</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Xác nhận thanh toán tự động
                            </label>
                            <p class="card-title-desc mt-1">Khoản thanh toán của khách hàng sẽ được hệ thống tự động xác nhận</p>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Xác nhận thanh toán thủ công
                            </label>
                            <p class="card-title-desc mt-1">Bạn cần vào chi tiết đơn hàng và ấn xác nhận thanh toán</p>
                        </div>

                        <a href="javascript: void(0);" class="btn btn-primary action-content button-confirm" data-show="open-form-momo" data-hide="button-confirm">Lưu</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
<script>
    $('.action-content').click(function(){
        var content_show = $(this).attr('data-show');
        var content_hide = $(this).attr('data-hide');
        $('.'+content_show).show();
        $('.'+content_hide).hide();
    });
</script>
@endsection