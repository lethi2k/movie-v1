@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thuế</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thuế</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý thuế</h4>
                <p class="card-title-desc mb-3">Thiết lập các loại thuế phục vụ bán hàng và nhập hàng cho cửa hàng của
                    bạn.</p>
                <a href="{{route('admin.setting.tax_types.create')}}"
                    class="btn btn-outline-secondary waves-effect">Thêm thông tin thuế</a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Tên thuế</th>
                                        <th class="align-middle">Loại thuế</th>
                                        <th class="align-middle">Thuế xuất</th>
                                        <th class="align-middle">Áp dụng mặc định</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taxes as $tax)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.setting.tax_types.edit', $tax->tax_rule_id)}}">
                                                {{$tax->taxClass->title}}
                                            </a>
                                        </td>
                                        <td>
                                            <p class="text-muted">{{$tax->taxRate->name}}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">{{number_format($tax->taxRate->rate)}}%</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-1"> {{$tax->based}}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection