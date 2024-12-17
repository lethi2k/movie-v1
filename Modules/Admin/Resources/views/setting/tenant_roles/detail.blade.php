@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Trở về</h4>

                    <div class="page-title-right">

                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Chi tiết vai trò</h4>
                <p class="card-title-desc">Thông tin chi tiết của vai trò để phục vụ cho việc quản lý sau này</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="role_name" class="form-label">Tên vai trò *</label>
                                <input id="role_name" name="role_name" value="Nhân viên kho" type="text"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="role_name" class="form-label">Ghi chú *</label>
                                <textarea required="" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Phân quyền chi tiết</h4>
                <p class="card-title-desc">Cho phép người quản lý giới hạn quyền của vai trò trong hệ thống</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2" checked="">
                            <label class="form-check-label" for="formCheck2">Sản phẩm</label>
                            <div class="row">
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xem sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Tạo sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Sửa sản phẩm</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xóa sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xuất file sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Nhập file sản phẩm</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formCheck2" checked="">
                            <label class="form-check-label" for="formCheck2">Nhập hàng</label>
                            <div class="row">
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xem sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Tạo sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Sửa sản phẩm</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xóa sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Xuất file sản phẩm</label>
                                </div>
                                <div class="col-md-4 mt-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                    <label class="form-check-label" for="formCheck2">Nhập file sản phẩm</label>
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