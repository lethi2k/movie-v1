@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Chào mừng quay trở lại !</h5>
                                    <p>Màn hình trang tổng quan</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('admin/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate">{{auth()->guard('admin')->user()->username}}</h5>
                                <p class="text-muted mb-0 text-truncate">Quản trị viên</p>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="font-size-15">{{auth()->guard('admin')->user()->product()}}</h5>
                                            <p class="text-muted mb-0">Sản phẩm</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-15">
                                            </h5>
                                            <p class="text-muted mb-0">Tổng giá trị phẩm</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 float-end">
                                        <a href="javascript: void(0);"
                                            class="btn btn-primary waves-effect waves-light btn-sm">Chi tiết <i
                                                class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Thu nhập hàng tháng</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-muted">Tháng này</p>
                                <h3>$34,252</h3>
                                <p class="text-muted"><span class="text-success me-2"> 12% <i
                                            class="mdi mdi-arrow-up"></i> </span> Theo kỳ trước</p>

                                <div class="mt-4">
                                    <a href="javascript: void(0);"
                                        class="btn btn-primary waves-effect waves-light btn-sm">Xem thêm <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">SẢN PHẨM BÁN CHẠY</h4>
                        <div class="d-flex" style="align-items: center">
                            <div class="flex-shrink-0 me-3">
                                {{-- <img class="rounded avatar-sm" src="{{$product->product->image}}"
                                    alt="Generic placeholder image"> --}}
                            </div>
                            <div class="flex-grow-1">
                                <!-- fw-bold  -->
                                <h4 class="text-body font-size-15 my-1">
                                    <a href="http://127.0.0.1:8000/admin/product/edit/57" class="link-primary">
                                        <span class="fw-500">Ghế sofa đơn Decox Doris</span>
                                    </a>
                                </h4>
                                <p class="text-muted mb-1">Model: P9583</p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="" data-bs-original-title="Ngày đăng">
                                        29 sản phẩm
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mt-4"><a href="javascript: void(0);"
                                class="btn btn-primary waves-effect waves-light btn-sm">Xem thêm <i
                                    class="mdi mdi-arrow-right ms-1"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Đơn hàng</p>
                                        <h4 class="mb-0"> đơn
                                        </h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Vận chuyển</p>
                                        <h4 class="mb-0">đơn</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Doanh thu COD</p>
                                        <h4 class="mb-0"> đồng</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap">
                            <h4 class="card-title mb-4">Thống kê doanh số bán hàng</h4>
                        </div>

                        <div id="product-column-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Các thành phố bán sản phẩm hàng đầu</h4>

                        <div class="text-center">
                            <div class="mb-4">
                                <i class="bx bx-map-pin text-primary display-4"></i>
                            </div>
                            <h3>1,456</h3>
                            <p>Hà Nội</p>
                        </div>

                        <div class="table-responsive mt-4">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 30%">
                                            <p class="mb-0">Hà Nội</p>
                                        </td>
                                        <td style="width: 25%">
                                            <h5 class="mb-0">1,456</h5>
                                        </td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-primary rounded" role="progressbar"
                                                    style="width: 94%" aria-valuenow="94" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Quảng Ninh</p>
                                        </td>
                                        <td>
                                            <h5 class="mb-0">1,123</h5>
                                        </td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-success rounded" role="progressbar"
                                                    style="width: 82%" aria-valuenow="82" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Vĩnh Phúc</p>
                                        </td>
                                        <td>
                                            <h5 class="mb-0">1,026</h5>
                                        </td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-warning rounded" role="progressbar"
                                                    style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@section('js')
<script src="{{URL::asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/pages/dashboard.init.js')}}"></script>
<script>
    var options = {
    series: [
        {
            name: "Đơn hàng",
            data: [10, 41, 35, 51, 110, 62, 69, 91, 148, 69, 91, 148],
        },
    ],
    chart: {
        height: 350,
        type: "line",
        zoom: {
            enabled: false,
        },
        toolbar: {
            autoSelected: "pan",
            show: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    grid: {
        row: {
            colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
            opacity: 0.5,
        },
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
    markers: {
        size: 3,
    },
    legend: {
        position: "left",
        floating: true,
        offsetY: 0,
        offsetX: 0,
    },
};
chart = new ApexCharts(document.querySelector("#product-column-chart"), options);
chart.render();

</script>
@endsection