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
                        <div class="row">
                            <div class="col-12 col-md-10 mb-2">
                                <div class="row">
                                    <div class="d-flex col-md-12">
                                        <div class="w-25">
                                            <div class="input-group">
                                                <select class="rounded-end-none form-select column-filter">
                                                    <option value="name">Tên</option>
                                                    <option value="user">Người tạo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-75 bd-highlight">
                                            <div class="search-product-right">
                                                <div class="position-relative">
                                                    <select class="rounded-start-none form-control select-category-ajax select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true"></select><span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" data-select2-id="2" style="width: 830.734px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-csuh-container"><span class="select2-selection__rendered" id="select2-csuh-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="d-flex flex-wrap gap-2 float-end">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="button-filter">Tìm kiếm</button>
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#methodCreate" class="btn btn-success waves-effect waves-light mb-2 me-2">
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
                                        <th class="align-middle">Tên nhóm</th>
                                        <th class="align-middle text-end">Duyệt khách hàng mới</th>
                                        <th class="align-middle text-end">Tổng số khách hàng</th>
                                        <th class="align-middle text-end">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.customers.group.edit', $group->customer_group_id)}}" class="link-primary">
                                                <span class="fw-500">{{$group->description->name}}</span>
                                            </a>
                                        </td>

                                        <td class="text-end">
                                            <div class="form-switch form-switch-lg mb-3" dir="ltr">
                                                @if($group->approval == 1)
                                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked="">
                                                @else
                                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            {{$group->totalCustomer()}}
                                        </td>

                                        <td>
                                            <div class="d-flex gap-3 float-end">
                                                <a href="{{route('admin.customers.group.destroy', $group->customer_group_id)}}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $groups->links('admin::vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@include('admin::ecommerce.customer_group.modal_select_create')
@endsection