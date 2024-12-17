@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Báo cáo</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Báo cáo</li>
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
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <h4 class="card-title">Báo Cáo Của Tôi</h4>
                                <p class="text-muted mb-0">Xem và tải các báo cáo trong vòng 6 tháng qua.</p>
                            </div>
                            <div class="col-sm-8">
                                
                            </div>
                            <!-- end col-->
                        </div>

                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#export" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Xuất đơn hàng</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#shipping" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Tài liệu vận chuyển</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#blance" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Báo cáo số dư</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#income" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Báo cáo thu nhập</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#maketting" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Báo cáo Maketting</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#analysis" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Báo cáo phân tích bán hàng</span>
                                </a>
                            </li>
                            
                        </ul>

                        <div class="tab-content mt-3 text-muted">
                            <div class="tab-pane active" id="export" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo doanh thu xuất hàng'])
                            </div>
                            <div class="tab-pane" id="shipping" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo vận chuyển'])
                            </div>
                            <div class="tab-pane" id="blance" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo số dư'])
                            </div>
                            <div class="tab-pane" id="income" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo thu nhập'])
                            </div>
                            <div class="tab-pane" id="maketting" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo maketting'])
                            </div>
                            <div class="tab-pane" id="analysis" role="tabpanel">
                                @include('admin::ecommerce.store._table_tab_report', ['type' => 'Báo cáo bán hàng'])
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