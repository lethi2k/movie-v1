@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Nhà cung cấp</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Nhà cung cấp</li>
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
                                <!-- <div class="d-md-flex flex-md-row-reverse flex-sm-column bd-highlight">

                                    <div class="mb-2 p-xxl-3 p-md-2 bd-highlight">
                                        <button type="button" class="btn btn-outline-light waves-effect"><i class="fa fa-fw fa-bars"></i></button>
                                    </div>

                                    <div class="p-xxl-3 p-md-2 bd-highlight">
                                        <button type="button" class="btn btn-outline-light waves-effect">Xuất dữ liệu</button>
                                    </div>


                                    <div class="p-xxl-3 p-md-2 bd-highlight row">
                                        <label for="example-text-input" class="col-md-3 col-form-label">Ngày Đặt hàng</label>
                                        <div class="col-md-9">
                                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                                <input type="text" class="form-control" name="start" placeholder="Start Date">
                                                <input type="text" class="form-control" name="end" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{URL::asset('admin/warehouse/supplier/create')}}" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkboxAll">
                                                <label class="form-check-label" for="checkboxAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">
                                            <div class="title-name">
                                                Tên nhà cung cấp
                                            </div>
                                            <div class="btn-group action-content" style="display: none; cursor: pointer;">
                                                <div class="dropdown-toggle fw-bold" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                    Chọn thao tác cho <span class="text-content fw-bold"></span> bản ghi <i class="mdi mdi-chevron-down"></i>
                                                </div>
                                                <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                                                    <li class="dropdown-item delete-supplier">Xóa nhà cung cấp</li>
                                                </ul>
                                            </div>
                                        </th>
                                        <th class="align-middle text-end">Địa chỉ</th>
                                        <th class="align-middle text-end">Nợ cần trả</th>
                                        <th class="align-middle text-end">Tổng mua</th>
                                        {{-- <th class="align-middle text-end">Hành động</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input action-checkbox" type="checkbox" value="{{$supplier->supplier_id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\SupplierController@edit',['id' => $supplier->supplier_id]) }}" class="link-primary">
                                                <span class="fw-bold font-size-15 my-1">{{$supplier->name}}</span>
                                            </a>
                                            <p class="text-muted mb-0">Nhà cung cấp thường xuyên</p>
                                        </td>
                                        <td class="text-end">
                                            <p class="text-muted mb-0">{{$supplier->company}} - {{$supplier->email}} - {{$supplier->phone}}</p>
                                            <p class="text-muted mb-0">247 Dịch vọng hậu, Cầu Giấy, Hà Nội</p>
                                        </td>

                                        <td class="text-end">
                                            2.000.000.đ
                                        </td>
                                        <td class="text-end">
                                            200.000.000.đ
                                        </td>

                                        {{-- <td>
                                            <div class="d-flex gap-3 float-end">
                                                <a href="{{action('Modules\Admin\Http\Controllers\Ecommerce\SupplierController@edit',['id' => $supplier->supplier_id]) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $suppliers->links('admin::vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('js')
<script>
    $('.delete-supplier').click(function() {
        var selected = [];
        $('.action-checkbox').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).val());
            }
        });

        $.ajax({
            url: "{{URL::asset('admin/warehouse/supplier/destroy/multiple')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                supplier_ids: selected,
            },
            success: function(json) {
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
</script>
@endsection