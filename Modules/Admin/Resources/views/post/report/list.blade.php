@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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

                        <h4 class="card-title">Bộ lọc sản phẩm</h4>
                        <p class="card-title-desc">Bạn có thể lọc thông tin sản phẩm qua Danh mục, Tên, Đơn hàng, Số lượng ....</p>

                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Từ khóa</label>
                                    <div class="col-md-10">
                                        <div class="d-flex ">
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
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Danh mục</label>
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
                                    <label for="example-text-input" class="col-md-2 col-form-label">Đã bán</label>
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
                                    <a href="{{URL::asset('admin/product/add')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
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
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Tên sản phẩm</th>
                                        <th class="align-middle text-end">Phân loại Hàng hóa</th>
                                        <th class="align-middle text-end">Giá</th>
                                        <th class="align-middle text-end">Kho hàng</th>
                                        <th class="align-middle text-end">Đã bán</th>
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
                                        <td>
                                            <div class="d-flex" style="align-items: center">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded avatar-sm" src="{{URL::asset('admin/assets/images/users/avatar-3.jpg')}}" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="badge badge-pill badge-soft-primary font-size-12">Giảm giá</span>
                                                    <span class="badge badge-pill badge-soft-success font-size-12">Kinh doanh</span>
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Ngừng kinh doanh </span>
                                                    <h5 class="text-body fw-bold font-size-14 my-1">Áo thun tay lỡ nam nữ form rộng chữ kiểu cá tính</h5>
                                                    <p class="text-muted mb-1">SKU: SPA</p>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Ngày đăng">
                                                            <i class="bx bx-calendar"></i> 15 Oct, 19
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Đánh giá">
                                                            <i class="bx bx-comment-dots me-1"></i> 183
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Lượt xem">
                                                            <i class="bx bx-show"></i> 102
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Lượt thích">
                                                            <i class="bx bx-heart"></i> 55
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            03 tùy chọn
                                        </td>
                                        <td class="text-end">
                                            <span style="text-decoration: line-through; color: #D5D5D5; display: block">6,800,000</span>
                                            <span>2,500,000</span>
                                        </td>
                                        <td class="text-end">
                                            100
                                        </td>
                                        <td class="text-end">
                                            20
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