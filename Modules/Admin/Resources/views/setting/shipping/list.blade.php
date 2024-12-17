@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Kết nối vận chuyển</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Kết nối vận chuyển</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Các dịch vụ vận chuyển</h4>
                <p class="card-title-desc">Các dịch vụ vận chuyển giúp bạn chuyển hàng tới khách hàng một cách nhanh
                    chóng, hiệu quả.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="https://bizweb.dktcdn.net/100/055/103/files/viettelpost2.png" alt=""
                            class="rounded avatar-lg">
                        <p class="card-title-desc mt-1">Cửa hàng của bạn chưa sử dụng dịch vụ vận chuyển Viettel Post.
                            Để tìm hiểu thêm về Viettel Post và các thông tin khác vui lòng . <a href="">Tại đây</a></p>
                        <hr>

                        <div class="open-form-momo" style="display: none">
                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input id="name" name="name" value="" type="text" class="form-control"
                                    placeholder="Nhập tài khoản">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Mật khẩu</label>
                                <input id="name" name="name" value="" type="text" class="form-control"
                                    placeholder="Nhập mật khẩu">
                            </div>

                            <div class="text-end mb-3">
                                <a href="javascript: void(0);"
                                    class="btn btn-outline-secondary px-3 mx-1 action-content"
                                    data-show="button-confirm" data-hide="open-form-momo">Huỷ</a>
                                <a href="javascript: void(0);" class="btn btn-success px-3">Lưu</a>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="javascript: void(0);" class="btn btn-primary action-content button-confirm"
                                data-show="open-form-momo" data-hide="button-confirm">Thiết lập</a>
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
<script>
    $('.action-content').click(function(){
        var content_show = $(this).attr('data-show');
        var content_hide = $(this).attr('data-hide');
        $('.'+content_show).show();
        $('.'+content_hide).hide();
    });
</script>
@endsection