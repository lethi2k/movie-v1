@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Kênh bán hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Kênh bán hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý kênh bán hàng</h4>
                <p class="card-title-desc">Bạn có thể đưa sản phẩm tới tay khách hàng thông qua các kênh bán hàng.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Kênh Đặt hàng Online</h4>
                                <p class="card-title-desc mt-1">Đăng ký và kết nối cửa hàng GrabMart với Sapo. Đồng bộ
                                    thông tin sản phẩm, tồn kho và đơn hàng giúp quản lý tập trung. <a href="">Xem thêm
                                        hướng dẫn</a></p>
                                <p class="card-title-desc mt-1">Bạn đang sử dụng gói Dùng thử Omnichannel</a></p>
                                <p class="card-title-desc mt-1">Ngày hết hạn: 03/04/2022</a></p>

                                <div class="text-start">
                                    <button class="btn btn-success waves-effect waves-light me-3">Truy cập kênh</button>
                                    <button class="btn btn-outline-secondary waves-effect me-3"> Cài đặt kênh</button>
                                    <a href="javascript: void(0);">Tắt kênh</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="card-img" style="width:60%" src="https://thile2603.mysapogo.com/v2/images/channel_image/web-order-active.png" alt="Card image">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title"> Kênh bán hàng trên ứng dụng Grab</h4>
                                <p class="card-title-desc mt-1">Đăng ký và kết nối cửa hàng GrabMart với Sapo. Đồng bộ
                                    thông tin sản phẩm, tồn kho và đơn hàng giúp quản lý tập trung. <a href="">Xem thêm
                                        hướng dẫn</a></p>
                                <p class="card-title-desc mt-1">Bạn đang sử dụng gói Dùng thử Omnichannel</a></p>
                                <p class="card-title-desc mt-1">Ngày hết hạn: 03/04/2022</a></p>

                                <div class="text-start">
                                    <button class="btn btn-success waves-effect waves-light me-3">Bật kênh</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="card-img" style="width:60%" src="https://thile2603.mysapogo.com/v2/images/channel_image/grab-mart.png" alt="Card image">   
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