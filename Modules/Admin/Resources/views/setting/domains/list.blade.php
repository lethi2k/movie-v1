@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cấu hình tên miền</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Cấu hình tên miền</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Cấu hình chuyển hướng</h4>
                <p class="card-title-desc">Bạn có thể cấu hình chuyển hướng tất cả các trang 404 về trang chủ.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2">
                            <label class="form-check-label" for="formCheck2">Chuyển hướng trang 404 về trang chủ</label>
                            <p class="card-title-desc mt-1">Chuyển hướng tất cả các trang 404(Not Found) về trang chủ.</p>
                        </div>
                        <hr>

                        <div class="text-end">
                            <a href="javascript: void(0);" class="btn btn-primary px-3">Lưu lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý tên miền</h4>
                <p class="card-title-desc mb-3">Bạn có thể đổi tên miền vừa đăng ký hoặc xóa tên miền khỏi cửa hàng của bạn.</p>
                <button type="button" class="btn btn-outline-secondary waves-effect">Thêm tên miền</button>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách tên miền</h4>
                        <p class="card-title-desc text-center mb-1">Website của bạn chưa có tên miền nào.</p>
                        <p class="card-title-desc text-center mt-1">Thêm mới tên miền giúp quảng bá thương hiệu của bạn tốt hơn.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection