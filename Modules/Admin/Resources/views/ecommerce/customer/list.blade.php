@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Khách hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Khách hàng</li>
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
                        <form action="{{route('admin.customers.customer.filter')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-10">
                                    <div class="mb-3 row">
                                        <div class="d-flex col-md-12">
                                            <div class="w-25">
                                                <div class="input-group">
                                                    <select class="rounded-end-none form-select" name="filter[customer][key]">
                                                        <option value="email">Email</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="w-75 bd-highlight">
                                                <div class="search-product-right">
                                                    <div class="position-relative">
                                                        <input type="text" name="filter[customer][value]" class="rounded-start-none form-control" placeholder="Tìm kiếm">
                                                        <i class="bx bx-search-alt search-icon px-2 search-product"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-12 col-md-2">
                                    <div class="d-flex flex-wrap gap-2 float-end">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
                                        <a href="{{route('admin.customers.customer.list')}}" class="btn btn-outline-light waves-effect">Nhập lại</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-sm-4">
                                <h4 class="card-title">0 Khách hàng</h4>
                            </div>
                            <div class="col-sm-8">

                                <div class="d-flex flex-wrap gap-2 float-end">
                                    <a href="{{URL::asset('admin/customers/group/list/all')}}" target="_blank" class="btn btn-success waves-effect">
                                        <i class="mdi mdi-account-group me-1"></i> Nhóm khách hàng
                                    </a>

                                    <a href="{{URL::asset('admin/customers/customer/create')}}" class="btn btn-success waves-effect waves-light me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm mới
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>


                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{$customer_group_id == 0 ? 'active' : ''}}" href="{{route('admin.customers.customer.list')}}">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tất cả</span>
                                </a>
                            </li>
                            @foreach ($groups as $group)
                                <li class="nav-item">
                                    <a class="nav-link {{$group->customer_group_id == $customer_group_id ? 'active' : ''}}" href="{{route('admin.customers.customer.group', ['customer_group_id' => $group->customer_group_id])}}">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">{{$group->description->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                            
                        </ul>

                        <div class="tab-content mt-3 text-muted">
                            <div class="tab-pane active" id="customer-all" role="tabpanel">
                                @include('admin::ecommerce.customer._table_tab')
                            </div>
                        </div>
                        {{ $customers->links('admin::vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection