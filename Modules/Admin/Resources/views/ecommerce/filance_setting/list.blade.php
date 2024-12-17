@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thiết lập Thanh Toán</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thiết lập Thanh Toán</li>
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
                            <div class="col-md-10">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <i class="bx bxs-credit-card-alt" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="card-title">Thanh toán bằng thẻ Tín dụng/Ghi nợ</h4>
                                        <p class="text-muted mb-0">Bật tùy chọn này để cho phép Người mua thanh toán bằng thẻ Tín dụng/Ghi nợ.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-switch form-switch-lg text-end" dir="ltr">
                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked="">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-10">
                            <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-credit-card" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h4 class="card-title">Mã PIN</h4>
                                <p class="text-muted mb-0">Cập nhật mã PIN</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="form-switch form-switch-lg text-end" dir="ltr">
                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked="">
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