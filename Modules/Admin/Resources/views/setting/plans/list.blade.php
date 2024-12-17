@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thông tin gói dịch vụ</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thông tin gói dịch vụ</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Tổng quan về tài khoản</h4>
                <p class="card-title-desc mb-3">Thông tin về các gói dịch vụ hiện tại gian hàng đang sử dụng.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm chính sách giá
                                    </button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Dịch vụ</th>
                                        <th class="align-middle">Ngày bắt đầu</th>
                                        <th class="align-middle">Ngày kết thúc</th>
                                        <th class="align-middle">Gói đang sử dụng</th>
                                        <th class="align-middle text-end">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1">
                                                Website
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1">26/03/2022</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1">03/04/2022</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1"> Dùng thử</p>
                                        </td>
                                        <td class="text-end">
                                            <a href="/admin/settings/plans/website" class="btn btn-outline-secondary waves-effect">Thay đổi gói dịch vụ</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Hóa đơn thanh toán</h4>
                <p class="card-title-desc mb-3">Thông tin các hóa đơn thanh toán dịch vụ.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách hóa đơn</h4>
                        <p class="card-title-desc text-center mb-1">Website của bạn chưa có giao dịch nào.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Thông tin dung lượng</h4>
                <p class="card-title-desc mb-3">Thông tin về dung lượng gian hàng đã sử dụng.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title-desc mb-1">Dung lượng đã sử dụng: 03.58 / 100.00 MB.</p>
                        <div class="progress progress-xl animated-progess mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection