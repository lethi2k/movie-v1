@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Kho hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Kho hàng</li>
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

                        <h4 class="card-title">Bộ lọc kho hàng</h4>
                        <p class="card-title-desc">Bạn có thể lọc thông tin kho hàng qua Người quản lý, Tên, Giá, Số lượng ....</p>

                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Lọc theo tên</label>
                                    <div class="col-md-10">
                                        <div class="search-product">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Tìm kiếm sku, tên sản phẩm, mã kho...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kho hàng</label>
                                    <div class="col-md-10">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="number" class="form-control" id="formrow-max" placeholder="Tối thiểu">
                                            </div>
                                            <span class="mx-3 mt-2"> - </span>
                                            <div class="flex-grow-1 align-self-center">
                                                <input type="number" class="form-control" id="formrow-price" placeholder="Tối đa">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Trạng thái</label>
                                    <div class="col-md-10">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="input-group">
                                                    <select class="form-select">
                                                        <option>Tất cả</option>
                                                        <option>Large select</option>
                                                        <option>Small select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Người quản lý</label>
                                    <div class="col-md-10">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="input-group">
                                                    <select class="form-select">
                                                        <option>Select</option>
                                                        <option>Large select</option>
                                                        <option>Small select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Giá nhập</label>
                                    <div class="col-md-10">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="number" class="form-control" id="formrow-max" placeholder="Tối thiểu">
                                            </div>
                                            <span class="mx-3 mt-2"> - </span>
                                            <div class="flex-grow-1 align-self-center">
                                                <input type="number" class="form-control" id="formrow-price" placeholder="Tối đa">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Ngày cân bằng</label>
                                    <div class="col-md-10">
                                        <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                            <input type="text" class="form-control" name="start" placeholder="Start Date">
                                            <input type="text" class="form-control" name="end" placeholder="End Date">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm</button>
                            <button type="button" class="btn btn-outline-light waves-effect">Nhập lại</button>
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
                                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </button>
                                </div>
                            </div><!-- end col-->
                        </div>

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
                                        <th class="align-middle">Mã kho</th>
                                        <th class="align-middle">Tên sản phẩm</th>
                                        <th class="align-middle text-end">Số lượng</th>
                                        <th class="align-middle text-end">Giá nhập</th>
                                        <th class="align-middle text-end">Số lượng chênh lệch</th>
                                        <th class="align-middle text-end">Giá trị chênh lệch</th>
                                        <th class="align-middle text-end">Người quản lý</th>
                                        <th class="align-middle text-end">Ngày cân bằng</th>
                                        <th class="align-middle text-end">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                        <td>
                                            <div class="d-flex" style="align-items: center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded avatar-sm" src="{{URL::asset('admin/assets/images/users/avatar-3.jpg')}}" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="badge badge-pill badge-soft-success font-size-12">Kinh doanh</span>
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Ngừng kinh doanh </span>
                                                    <h5 class="text-body fw-bold font-size-14 my-1">Áo thun tay lỡ nam nữ form rộng chữ kiểu cá tính</h5>
                                                    <p class="text-muted mb-1">SKU: SPA</p>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            20/1000
                                        </td>
                                        <td class="text-end">
                                            <span>2,500,000</span>
                                        </td>
                                        <td class="text-end">
                                            100
                                        </td>
                                        <td class="text-end">
                                            2,000,000
                                        </td>
                                        <td class="text-end">
                                            le thi
                                        </td>
                                        <td class="text-end">
                                            20/12/2020
                                        </td>

                                        <td>
                                            <div class="d-flex gap-3 float-end">
                                                <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
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