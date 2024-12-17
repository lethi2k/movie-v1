@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Góp ý</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Góp ý</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-0">

                            </div>
                            <div class="col-xxl-8 col-lg-12 mb-3">
                                <!-- <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-3 col-form-label">Ngày Đặt hàng</label>
                                    <div class="col-md-9">
                                        <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                            <input type="text" class="form-control" name="start" placeholder="Start Date">
                                            <input type="text" class="form-control" name="end" placeholder="End Date">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <form action="{{route('admin.customers.feedback.filter')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-10">
                                    <div class="mb-3 row">
                                        <div class="d-flex col-md-12">
                                            <div class="w-25">
                                                <div class="input-group">
                                                    <select class="rounded-end-none form-select" name="key">
                                                        <option value="email">Email</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="w-75 bd-highlight">
                                                <div class="search-product-right">
                                                    <div class="position-relative">
                                                        <input type="text" class="rounded-start-none form-control" value="{{isset($filter['value']) ? $filter['value'] : ''}}" name="value" placeholder="Tìm kiếm">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-12 col-md-2">
                                    <div class="d-flex flex-wrap gap-2 float-end">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
                                        <a href="{{route('admin.customers.feedback.list')}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
                                    </div>
                                </div>
                            </div>
                        
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="text-sm-end">
                                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Tạo mới
                                    </button>
                                </div> --}}
                            </div><!-- end col-->
                        </div>

                        <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{request()->route()->getName() == 'admin::customers.feedback.list' ? 'active' : ''}}" href="{{route('admin.customers.feedback.list')}}">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tất cả</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->route()->getName() == 'admin::customers.feedback.status' && isset($status) && $status == 0 ? 'active' : ''}}" href="{{route('admin.customers.feedback.status', ['status' => 0])}}">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Chờ xác nhận</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->route()->getName() == 'admin::customers.feedback.status' && isset($status) && $status == 1 ? 'active' : ''}}" href="{{route('admin.customers.feedback.status', ['status' => 1])}}">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Đã xác nhận</span>
                                </a>
                            </li>

                        </ul>

                        @include('admin::ecommerce.customer._table_tab_feedback')
                        {{ $feedbacks->links('admin::vendor.pagination.custom') }}

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
    <!-- Bootstrap rating js -->
    <script src="{{URL::asset('admin/assets/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/pages/rating-init.js')}}"></script>
@endsection