@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Đánh giá</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Đánh giá</li>
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
                                <div class="d-md-flex flex-md-row-reverse flex-sm-column bd-highlight">

                                    <div class="mb-2 p-xxl-3 p-md-2 bd-highlight">
                                        <button type="button" class="btn btn-outline-light waves-effect"><i class="fa fa-fw fa-bars"></i></button>
                                    </div>

                                    <div class="p-xxl-3 p-md-2 bd-highlight">
                                        <button type="button" class="btn btn-outline-light waves-effect">Xuất dữ liệu</button>
                                    </div>


                                    <div class="p-xxl-3 p-md-2 bd-highlight row">
                                        <label for="example-text-input" class="col-md-3 col-form-label">Thời gian:</label>
                                        <div class="col-md-9">
                                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                                <input type="text" class="form-control" name="start" placeholder="Start Date">
                                                <input type="text" class="form-control" name="end" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

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


                        <div class="row">
                            <div class="col-12 col-md-10">
                                <div class="mb-3 row">
                                    <div class="d-flex col-md-12">
                                        <div class="w-25">
                                            <div class="input-group">
                                                <select class="rounded-end-none form-select">
                                                    <option>Tất cả</option>
                                                    <option>Large select</option>
                                                    <option>Small select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-75 bd-highlight">
                                            <div class="search-product-right">
                                                <div class="position-relative">
                                                    <input type="text" class="rounded-start-none form-control" placeholder="Tìm kiếm">
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
                                    <button type="button" class="btn btn-outline-light waves-effect">Nhập lại</button>
                                </div>
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
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <h5 class="mb-sm-0 font-size-18">0.0/5</h5>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Tạo mới
                                    </button>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tất cả</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#noreply" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Chưa trả lời</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#reply" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Đã trả lời</span>
                                </a>
                            </li>
                           
                        </ul>

                        <div class="tab-content mt-3 text-muted">
                            <div class="tab-pane active" id="all" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab', ['reply' => 'Ok thanks'])
                            </div>
                            <div class="tab-pane" id="noreply" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab', ['reply' => 'Chưa trả lời'])
                            </div>
                            <div class="tab-pane" id="reply" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab', ['reply' => 'Cảm ơn bạn đã phản hồi'])
                            </div>
                        </div>

                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
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