@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row pb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Giao diện</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Giao diện</li>
                        </ol>
                    </div>
                </div>
                <a href="{{asset('')}}" target="_blank">
                    <i class="mdi mdi-eye-outline"></i> Xem website của bạn
                </a>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Giao diện đang sử dụng</h4>
                <p class="card-title-desc mb-3">Khách hàng sẽ thấy giao diện này khi họ xem website của bạn.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Giao diện thời trang</h4>
                                <p class="card-title-desc mb-3">Lần sửa cuối lúc: 30/03/2022 19:37.</p>
                            </div>
                            <div class="text-end col-md-6">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button"
                                        class="btn btn-outline-secondary waves-effect" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Thao tác <i class="mdi mdi-chevron-down"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                        <a class="dropdown-item" href="#">Xem thử giao diện</a>
                                        <hr class="my-1">
                                        <a class="dropdown-item" href="#">Đổi tên</a>
                                        <a class="dropdown-item" href="#">Sao chép</a>
                                        <a class="dropdown-item" href="#">Chỉnh sửa HTML/CSS</a>
                                        <a class="dropdown-item" href="#">Chỉnh sửa ngôn ngữ</a>
                                    </div>
                                </div>
                                <a href="{{route('admin.ecommerce.themes.edit', ['id' => 1])}}"
                                    class="btn btn-success waves-effect waves-light">Tùy chỉnh giao
                                    diện</a>
                            </div>
                        </div>
                        <img src="https://halink.vn/wp-content/uploads/2019/08/et-web-design-free-responsive-joomla-template.png"
                            class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Danh sách giao diện</h4>
                <p class="card-title-desc mb-3">Quản lý các giao diện của cửa hàng. Thêm và áp dụng giao diện cho cửa
                    hàng của bạn..</p>
                <button type="button" class="btn btn-outline-secondary waves-effect">Tải lên giao diện</button>
            </div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="d-flex" style="align-items: center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="text-body font-size-15 my-1">Giao diện đã mua</h4>
                                        <p class="text-muted mb-1">Danh sách các giao diện đã được mua cho website.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="button" style="width:100%"
                                    class="btn btn-outline-secondary waves-effect">Giao diện đã mua</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex" style="align-items: center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="text-body font-size-15 my-1">Kho giao diện</h4>
                                        <p class="text-muted mb-1">Xem thêm các giao diện khác trên kho giao diện của
                                            chúng tôi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="button" style="width:100%"
                                    class="btn btn-outline-secondary waves-effect">Kho giao diện</button>
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