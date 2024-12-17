@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row pb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Menu</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                </div>
                <a href="">
                    <i class="mdi mdi-link-plus"></i> Chuyển hướng 301
                </a>
            </div>
        </div>
        <hr class="mt-0">
        <!-- end page title -->
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title">Menu</h4>
                <p class="card-title-desc mb-1">Menu và danh sách liên kết giúp khách hàng điều hướng trên cửa hàng của
                    bạn dễ dàng hơn</p>
                <p class="card-title-desc">Bạn có thể tùy chỉnh hiển thị các menu mới cho giao diện của mình <a
                        href="">Chỉnh sửa giao diện</a>.</p>
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
                                    <a href="{{route('admin.links.create')}}"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Thêm menu
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle" style="width: 20%">Menu</th>
                                        <th class="align-middle">Liên kết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td>
                                                <a href="{{route('admin.links.edit', $group->taskbar_group_id)}}">
                                                    {{$group->description->name}}
                                                </a>
                                            </td>
                                            <td>
                                                <p class="card-title-desc my-1">{!! $group->taskbar() !!}</p>
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