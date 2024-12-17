@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Chính sách giá</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Chính sách giá</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý số lượng</h4>
                <p class="card-title-desc mb-3">Thống kê số lượng nhập, xuất đơn hàng theo kho hàng thống kê tồn kho và
                    các nghiệp vụ nâng cao của kho hàng.</p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{URL::asset('admin/setting/setting/create')}}" method="post"
                            class="form-setting-warehouse">
                            @csrf
                            <div class="form-check form-check-inline">
                                <input class="form-check-input action_warehouse" type="radio" name="warehouse_action"
                                    id="basic" value="basic" {{ config('settings.warehouse_action') == 'basic' ? 'checked'
                                    : '' }}>
                                <label class="form-check-label" for="basic">Cơ bản</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input action_warehouse" type="radio" name="warehouse_action"
                                    id="advanced" value="advanced" {{config('settings.warehouse_action') == 'advanced'
                                    ? 'checked' : '' }}>
                                <label class="form-check-label" for="advanced">Nâng cao</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Quản lý chính sách giá</h4>
                <p class="card-title-desc mb-3">Bên cạnh 3 chính sách giá mặc định được áp dụng khi bán hàng và nhập
                    hàng, bạn có thể bổ sung thêm các giá phù hợp với nhu cầu kinh doanh của cửa hàng.</p>
            </div>
            <div class="col-md-8">
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
                                        <i class="mdi mdi-plus me-1"></i> Thêm chính sách giá
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
                                        <th class="align-middle">Tên</th>
                                        <th class="align-middle">Mã</th>
                                        <th class="align-middle">Loại giá</th>
                                        <th class="align-middle text-end">Áp dụng mặc định</th>
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
                                        <td class="align-middle">
                                            <a href="http://127.0.0.1:8000/admin/setting/tenant_roles/detail">
                                                Giá bán lẻ
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1">BANLE</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-muted mb-1">Bán hàng</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <p class="text-muted mb-1"> BÁN HÀNG</p>
                                        </td>
                                    </tr>
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
@section('js')
<script>
    $('.action_warehouse').click(function () {
            $('.form-setting-warehouse').submit();
        });
</script>
@endsection