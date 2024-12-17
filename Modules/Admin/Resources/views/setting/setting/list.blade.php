@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cấu hình chung</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Cấu hình chung</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h4 class="card-title">Thông tin về cửa hàng</h4>
                                <p class="card-title-desc mb-3">Danh sách Cấu hình chung trong hệ thống</p>
                            </div>
                            <div class="col-sm-8">

                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/locations')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-user-circle fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Quản lý chi nhánh</h5>
                                            <p class="text-muted mb-0">Thêm và điều chỉnh thông tin chi nhánh</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/accounts')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-user-circle fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Quản lý nhân viên</h5>
                                            <p class="text-muted mb-0">Tạo và quản lý tất cả tài khoản nhân viên</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/tenant_roles')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-user-circle fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Phân quyền vai trò</h5>
                                            <p class="text-muted mb-0">Tạo, phân quyền và quản lý các vai trò của cửa
                                                hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-3">
                                <a href="{{URL::asset('admin/setting/payments')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-credit-card fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Phương thức thanh toán</h5>
                                            <p class="text-muted mb-0">Quản lý, cấu hình phương thức vận chuyển</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-3">
                                <a href="{{URL::asset('admin/setting/checkout')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs mb-3 me-3">
                                            <i
                                                class="mdi mdi-credit-card-wireless-outline fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Trang thanh toán</h5>
                                            <p class="text-muted mb-0">Tùy biến quy trình thanh toán online</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h4 class="card-title">Thông tin bán hàng và quản lý kho</h4>
                                <p class="card-title-desc mb-3">Danh sách Cấu hình chung trong hệ thống</p>
                            </div>
                            <div class="col-sm-8">

                            </div><!-- end col-->
                        </div>

                        <div class="row">

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/tax_types')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-map fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Thuế</h5>
                                            <p class="text-muted mb-0">Thiết lập thuế nhập và bán hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/price_lists')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-map fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Chính sách giá và số lượng</h5>
                                            <p class="text-muted mb-0">Tạo và quản lý các chính sách giá của cửa hàng
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/order_sources')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-map fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Nguồn bán hàng</h5>
                                            <p class="text-muted mb-0">Thêm và quản lý nguồn tạo ra đơn hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-1 p-2 border-danger">
                                <a href="{{URL::asset('admin/setting/print_forms')}}">
                                    <div class="d-flex mt-1">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-map fz-xx-large text-secondary"></i>
                                            <span
                                                class="position-absolute top-0 end-80 translate-middle badge rounded-pill bg-danger px-3">Chờ ra mắt</span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Mẫu in</h5>
                                            <p class="text-muted mb-0">Thiết lập và tuỳ chỉnh mẫu in cho các chi nhánh
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-3">
                                <a href="{{URL::asset('admin/setting/shipping')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bxs-truck fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Vận chuyển</h5>
                                            <p class="text-muted mb-0">Quản lý, cấu hình phương thức vận chuyển</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h4 class="card-title">Cấu hình hệ thống</h4>
                                <p class="card-title-desc mb-3">Danh sách Cấu hình chung trong hệ thống</p>
                            </div>
                            <div class="col-sm-8">

                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/setting/store')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-cog fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Cấu hình chung</h5>
                                            <p class="text-muted mb-0">Cấu hình thông tin chung cửa hàng của bạn</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/channels')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs me-3">
                                            <i class="bx bx-share-alt fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Kênh bán hàng</h5>
                                            <p class="text-muted mb-0">Quản lý các kênh bạn sử dụng để bán hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 mb-3">
                                <a href="{{URL::asset('admin/setting/domains')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs mb-3 me-3">
                                            <i class="mdi mdi-earth-plus fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Tên miền</h5>
                                            <p class="text-muted mb-0">Quản lý, cấu hình phương thức vận chuyển</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-3">
                                <a href="{{URL::asset('admin/setting/plans')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs mb-3 me-3">
                                            <i class="mdi mdi-clipboard-list-outline fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Gói dịch vụ</h5>
                                            <p class="text-muted mb-0">Quản lý, cấu hình phương thức vận chuyển</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-sm-6 my-3">
                                <a href="{{URL::asset('admin/setting/notifications')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs mb-3 me-3">
                                            <i class="mdi mdi-bell-ring fz-xx-large text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Thông báo</h5>
                                            <p class="text-muted mb-0">Quản lý, cấu hình phương thức vận chuyển</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-sm-6 my-1 p-2 border-danger">
                                <a href="{{URL::asset('admin/setting/logs')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs mb-3 me-3">
                                            <i class="mdi mdi-bell-ring fz-xx-large text-secondary"></i>
                                            <span
                                                class="position-absolute top-0 end-80 translate-middle badge rounded-pill bg-danger px-3">Chờ ra mắt</span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-0 link-primary">Nhật ký hoạt động</h5>
                                            <p class="text-muted mb-0">Quản lý toàn bộ thao tác, nhật ký hoạt động trong
                                                cửa hàng</p>
                                        </div>
                                    </div>
                                </a>
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