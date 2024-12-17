@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Cửa hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Cửa hàng</li>
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

                        <div class="row mb-1">
                            <div class="col-sm-4">
                                <h4 class="card-title">9 Cửa hàng <i class="bx bx-info-circle"></i></h4>
                                <p class="card-title-desc mb-3">Danh sách cửa hàng trong hệ thống</p>
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <a href="{{URL::asset('admin/store/create')}}" class="btn btn-success waves-effect waves-light me-2">
                                    <i class="mdi mdi-plus me-1"></i> Thêm cửa hàng
                                </a>
                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            @foreach($stores as $store)
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="text-center p-4 border-end">
                                                    <div class="avatar-sm mx-auto mb-3 mt-1">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                                            B
                                                        </span>
                                                    </div>
                                                    <h5 class="text-truncate pb-1">{{$store->description->name}}</h5>
                                                    <p class="text-muted mb-1">Lê Đình Thi - {{$store->telephone}}</p>
                                                    <p class="text-muted mb-0">{{$store->address->address}} {{$store->address->commune->name}}, {{$store->address->district->name}}, {{$store->address->province->name}}, {{$store->address->country->name}}</p>

                                                    <ul class="list-inline mb-0 border-top mt-3 py-2">
                                                        <li class="list-inline-item me-3">
                                                            <span class="badge bg-success">Đang lựa chọn</span>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <i class="bx bx bx-user me-1"></i> 10
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <i class="bx bx-calendar me-1"></i> 15/08/2012
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="p-4 text-center text-xl-start">
                                                    <div class="row mb-3">
                                                        <div class="col-6">
                                                            <div>
                                                                <p class="text-muted mb-2 text-truncate">Chi phí</p>
                                                                <p class="fw-bold font-size-16 mb-0">200.000.000.đ</p>
                                                                <p class="text-muted text-truncate mb-0">+ 0.2 % <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div>
                                                                <p class="text-muted mb-2 text-truncate">Doanh Thu</p>
                                                                <p class="fw-bold font-size-16 mb-0">100.000.000.đ</p>
                                                                <p class="text-muted text-truncate mb-0">- 0.2 % <i class="mdi mdi-arrow-down ms-1 text-danger"></i></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="text-muted mb-2 text-truncate">Sản phẩm</p>
                                                            <p class="fw-bold font-size-16 mb-0">112</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-muted mb-2 text-truncate">Đơn hàng</p>
                                                            <p class="fw-bold font-size-16 mb-0">20</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\StoreController@edit',['id' => $store->store_id]) }}" class="text-decoration-underline link-primary">Xem chi tiết <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        {{ $stores->links('admin::vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection