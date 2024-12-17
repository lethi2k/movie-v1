@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Trang thanh toán</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Trang thanh toán</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Kiểu hiển thị trang thanh toán</h4>
                <p class="card-title-desc">Bạn có thể lựa chọn giao diện trang thanh toán hiển thị trên cùng một trang
                    hay chia thành nhiều bước.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Trang thanh toán 1 bước
                            </label>
                            <p class="card-title-desc mt-1">Tất cả các bước thanh toán bao gồm thông tin người mua, vận
                                chuyển, hình thức thanh toán được hiển thị trên một màn hình.</p>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Trang thanh toán nhiều bước
                            </label>
                            <p class="card-title-desc mt-1">Trang thanh toán được chia ra thành từng bước như thông tin
                                người mua, vận chuyển, hình thức thanh toán.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Tài khoản khách hàng</h4>
                <p class="card-title-desc">Bạn có thể chọn chỉ những khách hàng có đăng ký tài khoản mới có thể mua
                    hàng.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Vô hiệu chức năng tài khoản
                            </label>
                            <p class="card-title-desc mt-1">Khách hàng chỉ có thể thanh toán là khách.</p>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Bắt buộc có tài khoản
                            </label>
                            <p class="card-title-desc mt-1">Khách hàng chỉ có thể thanh toán nếu đăng ký tài khoản.</p>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">
                                Không bắt buộc có tài khoản
                            </label>
                            <p class="card-title-desc mt-1">Khách hàng có thể thanh toán mà không cần tài khoản.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Thông tin thanh toán</h4>
                <p class="card-title-desc">Thông tin thanh toán Bạn có thể chọn các thông tin mà khách hàng cần cung cấp
                    mỗi khi thanh toán. Chúng tôi khuyến khích tắt các thông tin không cần thiết với bạn.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="content-checked">
                            <label for="">Số điện thoại</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Ẩn</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Không bắt buộc</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Bắt buộc</label>
                            </div>
                        </div>
                        <hr>

                        <div class="content-checked">
                            <label for="">Email</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Ẩn</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Không bắt buộc</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Bắt buộc</label>
                            </div>
                        </div>
                        <hr>

                        <div class="content-checked">
                            <label for="">Địa chỉ</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Ẩn</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Không bắt buộc</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Bắt buộc</label>
                            </div>
                        </div>
                        <hr>

                        <div class="content-checked">
                            <label for="">Quận/Huyện</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Ẩn</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Không bắt buộc</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Bắt buộc</label>
                            </div>
                        </div>
                        <hr>

                        <div class="content-checked">
                            <label for="">Phường/Xã</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Ẩn</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Không bắt buộc</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">Bắt buộc</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Xử lý đơn hàng</h4>
                <p class="card-title-desc">Thay đổi quy trình xử lý trên website của bạn.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="content-checkbox">
                            <label for="">Thông tin người nhận hàng</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">
                                    Cho phép khách hàng nhập thông tin nhận hàng khác với thông tin mua hàng
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="content-checkbox">
                            <label for="">Tự động lưu trữ đơn hàng</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1"
                                    checked="">
                                <label class="form-check-label" for="formRadios1">
                                    Đơn hàng sẽ được tự động lưu trữ nếu đã thanh toán và giao hàng
                                </label>
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title">Nếu khách hàng chưa thanh toán, hãy gửi cho họ một thông báo bằng email
                            để hoàn thành đơn hàng của họ</h4>
                        <p class="card-title-desc">Nếu được chọn, thông báo sẽ được gửi tới tất cả khách hàng, bao gồm
                            cả những người không đồng ý nhận tiếp thị.</p>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Không bao giờ</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Sau 1 giờ (Khuyến nghị)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Sau 6 giờ</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Sau 10 giờ (Khuyến nghị)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                            <label class="form-check-label" for="formRadios1">Sau 24 giờ</label>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nội dung thông báo thêm</label>
                            <textarea required="" class="form-control" rows="3"></textarea>
                            <p class="card-title-desc mt-1">Các thông báo, hướng dẫn bạn muốn xuất hiện ở trang thông báo mua
                                hàng thành công sau khi thanh toán. Đây là một nơi thích hợp để đặt các mã theo dõi đơn
                                hàng, ROI.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Điều khoản sử dụng, bảo mật, hoàn trả</h4>
                <p class="card-title-desc">Các chính sách, điều khoản dịch vụ được áp dụng trên website của bạn.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="title">
                            <p class="card-title-desc float-start">Chính sách hoàn trả.</p>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary waves-effect">Sử dụng nội dung
                                    mẫu</button>
                            </div>
                        </div>
                        <textarea required="" class="form-control" rows="3"></textarea>
                        <hr>
                        <div class="title">
                            <p class="card-title-desc float-start">Chính sách bảo mật.</p>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary waves-effect">Sử dụng nội dung
                                    mẫu</button>
                            </div>
                        </div>
                        <textarea required="" class="form-control" rows="3"></textarea>
                        <hr>
                        <div class="title">
                            <p class="card-title-desc float-start">Điều khoản sử dụng.</p>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary waves-effect">Sử dụng nội dung
                                    mẫu</button>
                            </div>
                        </div>
                        <textarea required="" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Nội dung chân trang thanh toán</h4>
                <p class="card-title-desc">Nội dung hiển thị trong trang thanh toán của website.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nội dung chân trang thanh toán</label>
                            <textarea required="" class="form-control" rows="3"></textarea>
                            <p class="card-title-desc mt-1">Nội dung này chỉ hiển thị ở chân trang thanh toán và trang đặt hàng thành công.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Ngôn ngữ trang thanh toán</h4>
                <p class="card-title-desc">Tùy chỉnh ngôn ngữ trang thanh toán của cửa hàng của bạn.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc">Ngôn ngữ đang sử dụng: <b>Tiếng Việt</b></p>
                        <button type="button" class="btn btn-outline-secondary waves-effect">Sử dụng nội dung
                            mẫu</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection