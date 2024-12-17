@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tài khoản ngân hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Tài khoản ngân hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h5 class="card-title mb-4">Danh sách tài khoản</h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="{{URL::asset('admin/portal/finance/cards/create')}}" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                <i class="mdi mdi-plus me-1"></i> Thêm mới
                            </a>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card bg-success text-white visa-card mb-0">
                            <div class="card-body">
                                <div>
                                    <i class="bx bxl-mastercard visa-pattern"></i>

                                    <div class="float-end">
                                        {{-- <i class="bx bxl-mastercard visa-logo display-3"></i> --}}
                                        <img src="https://trustweb.vn/wp-content/uploads/2016/11/the-napas-la-gi-cong-thanh-toan-napas-la-gi-2411-7383.png" alt="" class="avatar-sm">
                                    </div>

                                    <div>
                                        {{-- <i class="bx bx-chip h1 text-warning"></i> --}}
                                        <img class="rounded avatar-card" src="https://ibank.agribank.com.vn/ibank/img/logo_agribank.png" alt="Generic placeholder image">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-3">
                                        <p class="font-size-22 fw-bold">
                                            9704
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p class="font-size-22 fw-bold">
                                            0507
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p class="font-size-22 fw-bold">
                                            4902
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p class="font-size-22 fw-bold">
                                            9901
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h5 class="text-white float-end mb-0">05/18</h5>
                                    <h5 class="text-white mb-0">LE DINH THI</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection